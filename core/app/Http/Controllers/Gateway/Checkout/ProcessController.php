<?php

namespace App\Http\Controllers\Gateway\Checkout;

use App\Models\Deposit;
use App\Lib\CurlRequest;
use App\Constants\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{

    public static function process($deposit)
    {
        $alias = $deposit->gateway->alias;

        $send['track']  = $deposit->trx;
        $send['view']   = 'user.payment.' . $alias;
        $send['method'] = 'post';
        $send['url']    = route('ipn.' . $alias);
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $track   = $request->track;
        $deposit = Deposit::where('trx', $track)->where('status', Status::PAYMENT_INITIATE)->orderBy('id', 'DESC')->with('donation.image')->first();

        $failedRedirectUrl  = $deposit->gatewayRedirectUrl();
        $successRedirectUrl = $deposit->gatewayRedirectUrl(true);

        if ($deposit->status == Status::PAYMENT_SUCCESS) {
            $notify[] = ['error', 'Invalid request.'];
            return to_route(...$failedRedirectUrl)->withNotify($notify);
        }
        $this->validate($request, [
            'cardNumber' => 'required',
            'cardExpiry' => 'required',
            'cardCVC'    => 'required',
        ]);

        $checkoutAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $processingChannelId = $checkoutAcc->processing_channel_id;
        $publicKey   = $checkoutAcc->public_key;
        $secretKey   = $checkoutAcc->secret_key;
        $cardExpire  = explode('/', $request->cardExpiry);



        $data = array(
            'type'         => 'card',
            'number'       => str_replace(' ', '', $request->cardNumber),
            'expiry_month' => $cardExpire[0],
            'expiry_year'  => $cardExpire[1],
            'cvv'          => $request->cardCVC,
        );

        $tokenUrl = 'https://api.checkout.com/tokens';
        $paymentUrl = "https://api.checkout.com/payments";

        $response = CurlRequest::curlPostContent($tokenUrl, json_encode($data), array(
            'Content-Type: application/json',
            'Authorization: ' . $publicKey,
        ));

        $response = json_decode($response);

        if (@$response->token) {
            $cardToken      = $response->token;
        } else {

            foreach ($response->error_codes ?? [] as $error) {
                $notify[] = ['error', $error];
            }
            return to_route(...$failedRedirectUrl)->withNotify($notify);
        }

        if (!$deposit->donation_id) {

            $data = array(
                "source"                => array(
                    "type"  => "token",
                    "token" => $cardToken,
                ),
                "amount"                => (int)(round($deposit->final_amo, 2) * 100),
                "currency"              => $deposit->method_currency,
                "processing_channel_id" => $processingChannelId,
                "reference"             => $deposit->trx,
                "capture"               => true,
                "customer"              => array(
                    "email" => @$deposit->user->email,
                    "name"  => @$deposit->user->fullname,
                    "phone" => array(
                        "number"       => @$deposit->user->mobile,
                    ),
                )
            );
        } else {


            $data = array(
                "source"                => array(
                    "type"  => "token",
                    "token" => $cardToken,
                ),
                "amount"                => (int)(round($deposit->final_amo, 2) * 100),
                "currency"              => $deposit->method_currency,
                "processing_channel_id" => $processingChannelId,
                "reference"             => $deposit->trx,
                "capture"               => true,
                "customer"              => array(
                    "email" => @$deposit->donation->sender->email,
                    "name"  => @$deposit->donation->sender->name,
                    "phone" => array(
                        "number"       => @$deposit->donation->sender->mobile,
                    ),
                )
            );
        }

        $data = json_encode($data);

        $result = CurlRequest::curlPostContent(
            $paymentUrl,
            $data,
            array(
                "Authorization: $secretKey",
                "Content-Type: application/json",
                "Content-Length: " . strlen($data)
            )
        );

        $result = json_decode($result);




        if ((@$result->status == 'Authorized' || @$result->status == 'Captured')) {
            PaymentController::userDataUpdate($deposit);
           if($deposit->donation_id){
                        $notify[] = ['success', 'Donation successfully sent'];
                    }else{
                        $notify[] = ['success', 'Payment captured successfully'];

                    }
            return to_route(...$successRedirectUrl)->withNotify($notify);
        }

        $notify[] = ['error', 'Payment Failed'];
        return to_route(...$failedRedirectUrl)->withNotify($notify);
    }
}
