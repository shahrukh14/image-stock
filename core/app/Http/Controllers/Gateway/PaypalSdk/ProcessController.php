<?php

namespace App\Http\Controllers\Gateway\PaypalSdk;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Gateway\PaypalSdk\Core\PayPalHttpClient;
use App\Http\Controllers\Gateway\PaypalSdk\Core\ProductionEnvironment;
use App\Http\Controllers\Gateway\PaypalSdk\Core\SandboxEnvironment;
use App\Http\Controllers\Gateway\PaypalSdk\Orders\OrdersCaptureRequest;
use App\Http\Controllers\Gateway\PaypalSdk\Orders\OrdersCreateRequest;
use App\Http\Controllers\Gateway\PaypalSdk\PayPalHttp\HttpException;
use App\Models\Deposit;

class ProcessController extends Controller
{

    public static function process($deposit)
    {
        $paypalAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);

        $failedRedirectUrl  = $deposit->gatewayRedirectUrl();


        // Creating an environment
        $clientId = $paypalAcc->clientId;
        $clientSecret = $paypalAcc->clientSecret;
        // $environment = new SandboxEnvironment($clientId, $clientSecret); //For Test Key
        $environment = new ProductionEnvironment($clientId, $clientSecret); //For live Key
        $client = new PayPalHttpClient($environment);
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $deposit->trx,
                "amount" => [
                    "value" => (string) round($deposit->final_amo, 2),
                    "currency_code" => $deposit->method_currency
                ]
            ]],
            "application_context" => [
                "cancel_url" => route(...$failedRedirectUrl),
                "return_url" => route('ipn.' . $deposit->gateway->alias)
            ]
        ];

        try {
            $response = $client->execute($request);

            $deposit->btc_wallet = $response->result->id;
            $deposit->save();

            $send['redirect'] = true;
            $send['redirect_url'] = $response->result->links[1]->href;
        } catch (HttpException $ex) {
            $send['error'] = true;
            $send['message'] = json_decode($ex->getMessage())->error_description;
        }

        return json_encode($send);
    }
    

    public function ipn()
    {
        $request = new OrdersCaptureRequest($_GET['token']);
        $request->prefer('return=representation');
        try {
            $deposit = Deposit::where('btc_wallet', $_GET['token'])->where('status', Status::PAYMENT_INITIATE)->orderBy('id', 'DESC')->with('donation.image')->first();
            $failedRedirectUrl  = $deposit->gatewayRedirectUrl();
            $successRedirectUrl = $deposit->gatewayRedirectUrl(true);

            $paypalAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
            $clientId = $paypalAcc->clientId;
            $clientSecret = $paypalAcc->clientSecret;
            $environment = new SandboxEnvironment($clientId, $clientSecret); //For Test Key
            // $environment = new ProductionEnvironment($clientId, $clientSecret); //For live Key
            $client = new PayPalHttpClient($environment);

            $response = $client->execute($request);

            if (@$response->result->status == 'COMPLETED') {
                $deposit->detail = json_decode(json_encode($response->result->payer));
                $deposit->save();

                PaymentController::userDataUpdate($deposit);
               if($deposit->donation_id){
                        $notify[] = ['success', 'Donation successfully sent'];
                    }else{
                        if(session('imagePayment') === 1){
                            $notify[] = ['success', 'Click on the download icon to download your image'];
                        }else{
                            PaymentController::userDataUpdate($deposit);
                            $notify[] = ['success', 'Payment captured successfully'];
                        }

                    }
                return to_route(...$successRedirectUrl)->withNotify($notify);
            } else {

                $notify[] = ['error', 'Payment captured failed'];
                return to_route(...$failedRedirectUrl)->withNotify($notify);
            }
        } catch (HttpException $ex) {
            $notify[] = ['error', json_decode($ex->getMessage())->error_description];
            return to_route(...$failedRedirectUrl)->withNotify($notify);
        }
    }
}
