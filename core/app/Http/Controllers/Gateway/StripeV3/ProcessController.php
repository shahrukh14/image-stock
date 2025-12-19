<?php

namespace App\Http\Controllers\Gateway\StripeV3;

use App\Models\Deposit;
use App\Constants\Status;
use Illuminate\Http\Request;
use App\Models\GatewayCurrency;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;


class ProcessController extends Controller
{

    public static function process($deposit)
    {
        Log::info('Stripe Payment Process Started', [
            'deposit_id' => $deposit->id,
            'user_id' => $deposit->user_id,
        ]);

        $failedRedirectUrl  = $deposit->gatewayRedirectUrl();
        $successRedirectUrl = route('ipn.' . $deposit->gateway->alias) . '?session_id={CHECKOUT_SESSION_ID}';

        $StripeAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $alias = $deposit->gateway->alias;

        Log::info('Stripe Account Parameters Loaded', [
            'alias' => $alias,
            'publishable_key' => $StripeAcc->publishable_key ?? null,
            'currency' => $deposit->method_currency,
        ]);

        \Stripe\Stripe::setApiKey($StripeAcc->secret_key);

        try {
            $lineItemData = [
                'price_data' => [
                    'currency' => $deposit->method_currency,
                    'product_data' => [
                        'name' => gs('site_name'),
                        'description' => 'Deposit with Stripe',
                        'images' => [asset('assets/images/logoIcon/logo.png')],
                    ],
                    'unit_amount' => round($deposit->final_amo, 2) * 100,
                ],
                'quantity' => 1,
            ];

            Log::info('Stripe Line Item Data', $lineItemData);

            $sessionParams = [
                'payment_method_types' => ['card'],
                'line_items' => [$lineItemData],
                'mode' => 'payment',
                'cancel_url'  => route(...$failedRedirectUrl),
                'success_url' => $successRedirectUrl,
            ];

            Log::info('Stripe Session Creation Params', $sessionParams);

            $session = \Stripe\Checkout\Session::create($sessionParams);

            Log::info('Stripe Session Created Successfully', [
                'session_id' => $session->id,
                'payment_status' => $session->payment_status ?? null,
            ]);

        } catch (\Exception $e) {
            Log::error('Stripe Session Creation Failed', [
                'error_message' => $e->getMessage(),
                'deposit_id' => $deposit->id,
            ]);

            $send['error'] = true;
            $send['message'] = $e->getMessage();
            return json_encode($send);
        }

        $send['view'] = 'user.payment.'.$alias;
        $send['session'] = $session;
        $send['StripeJSAcc'] = $StripeAcc;

        $deposit->btc_wallet = $session->id;
        $deposit->save();

        Log::info('Stripe Process Completed', [
            'deposit_id' => $deposit->id,
            'session_id' => $session->id,
        ]);

        return json_encode($send);
    }



 
    public function ipn(Request $request)
    {
        $rediectUrl = "user.purchase.history";

        Log::info('Stripe IPN called', [
            'request_query' => $request->query(),
            'request_all' => $request->all(),
        ]);

        $StripeAcc = GatewayCurrency::where('gateway_alias','StripeV3')->orderBy('id','desc')->first();

        if (!$StripeAcc) {
            Log::error('Stripe IPN: No Stripe GatewayCurrency found');
            $notify[] = ['error', 'Payment gateway not configured'];
            return to_route($rediectUrl)->withNotify($notify);
        }

        $gateway_parameter = json_decode($StripeAcc->gateway_parameter);

        Log::info('Stripe IPN: Loaded gateway parameters', [
            'gateway_alias' => $StripeAcc->gateway_alias,
            'publishable_key' => $gateway_parameter->publishable_key ?? null,
        ]);

        \Stripe\Stripe::setApiKey($gateway_parameter->secret_key);

        $sessionId = $request->input('session_id') ?? $request->session()->get('session_id');

        if (!$sessionId) {
            Log::error('Stripe IPN: Missing session_id in request');
            $notify[] = ['error', 'Missing session ID'];
            return to_route($rediectUrl)->withNotify($notify);
        }

        Log::info('Stripe IPN: Attempting to retrieve session', [
            'session_id' => $sessionId,
        ]);

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            Log::info('Stripe IPN: Session retrieved successfully', [
                'session_id' => $session->id,
                'payment_status' => $session->payment_status,
            ]);
        } catch (\Exception $e) {
            Log::error('Stripe IPN: Failed to retrieve session', [
                'session_id' => $sessionId,
                'error_message' => $e->getMessage(),
            ]);

            $notify[] = ['error', $e->getMessage()];
            return to_route($rediectUrl)->withNotify($notify);
        }

        if ($session->payment_status === 'paid') {
            Log::info('Stripe IPN: Payment marked as paid', [
                'session_id' => $session->id,
            ]);

            $deposit = Deposit::where('btc_wallet', $session->id)
                ->orderBy('id', 'DESC')
                ->first();

            if ($deposit) {
                Log::info('Stripe IPN: Matching deposit found', [
                    'deposit_id' => $deposit->id,
                    'status' => $deposit->status,
                ]);

                if ($deposit->status == Status::PAYMENT_INITIATE) {
                    PaymentController::userDataUpdate($deposit);
                    Log::info('Stripe IPN: userDataUpdate Method Called', [
                        'deposit' => $deposit,
                    ]);
                    $notify[] = ['success', 'Payment captured successfully'];
                } else {
                    Log::warning('Stripe IPN: Deposit already processed or in wrong status', [
                        'deposit_id' => $deposit->id,
                        'status' => $deposit->status,
                    ]);
                }
            } else {
                Log::error('Stripe IPN: No matching deposit found for session', [
                    'session_id' => $session->id,
                ]);
            }

            return to_route($rediectUrl)->withNotify($notify);
        }

        Log::warning('Stripe IPN: Payment not marked as paid', [
            'session_id' => $session->id,
            'payment_status' => $session->payment_status,
        ]);

        $notify[] = ['error', "Payment failed"];
        return to_route($rediectUrl)->withNotify($notify);
    }



    // public function ipn(Request $request)
    // {
    //     $StripeAcc = GatewayCurrency::where('gateway_alias','StripeV3')->orderBy('id','desc')->first();
    //     $gateway_parameter = json_decode($StripeAcc->gateway_parameter);


    //     \Stripe\Stripe::setApiKey($gateway_parameter->secret_key);

    //     // You can find your endpoint's secret in your webhook settings
    //     $endpoint_secret = $gateway_parameter->end_point; // main
    //     $payload = @file_get_contents('php://input');
    //     $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];


    //     $event = null;
    //     try {
    //         $event = \Stripe\Webhook::constructEvent(
    //             $payload, $sig_header, $endpoint_secret
    //         );
    //     } catch(\UnexpectedValueException $e) {
    //         // Invalid payload
    //         http_response_code(400);
    //         exit();
    //     } catch(\Stripe\Exception\SignatureVerificationException $e) {
    //         // Invalid signature
    //         http_response_code(400);
    //         exit();
    //     }

    //     // Handle the checkout.session.completed event
    //     if ($event->type == 'checkout.session.completed') {
    //         $session = $event->data->object;
    //         $deposit = Deposit::where('btc_wallet',  $session->id)->with('donaion.image')->orderBy('id', 'DESC')->first();

    //         if($deposit->status==Status::PAYMENT_INITIATE){
    //             PaymentController::userDataUpdate($deposit);
    //         }
    //     }
    //     http_response_code(200);
    // }
}
