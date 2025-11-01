<?php

namespace App\Http\Controllers\Gateway\Cashmaal;

use App\Constants\Status;
use App\Models\Deposit;
use App\Models\GatewayCurrency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /*
     * Cashmaal
     */

    public static function process($deposit)
    {      

        
        $failedRedirectUrl  = $deposit->gatewayRedirectUrl();
        $successRedirectUrl = $deposit->gatewayRedirectUrl(true);

    	$cashmaal = $deposit->gatewayCurrency();
    	$param = json_decode($cashmaal->gateway_parameter);
        $val['pay_method'] = " ";
        $val['amount'] = getAmount($deposit->final_amo);
        $val['currency'] = $cashmaal->currency;
        $val['succes_url'] = route(...$successRedirectUrl);
        $val['cancel_url'] = route(...$failedRedirectUrl);
        $val['client_email'] = auth()->user()->email;
        $val['web_id'] = $param->web_id;
        $val['order_id'] = $deposit->trx;
        $val['addi_info'] = "Deposit";
        $send['url'] = 'https://www.cashmaal.com/Pay/';
        $send['method'] = 'post';
        $send['view'] = 'user.payment.redirect';
        $send['val'] = $val;
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
    	$gateway = GatewayCurrency::where('gateway_alias','Cashmaal')->where('currency',$request->currency)->first();
        $IPN_key=json_decode($gateway->gateway_parameter)->ipn_key;
        $web_id=json_decode($gateway->gateway_parameter)->web_id;

        $deposit = Deposit::where('trx', $_POST['order_id'])->where('status', Status::PAYMENT_INITIATE)->orderBy('id', 'DESC')->with('donation.image')->first();
        $failedRedirectUrl  = $deposit->gatewayRedirectUrl();
        $successRedirectUrl = $deposit->gatewayRedirectUrl(true);

        if ($request->ipn_key != $IPN_key && $web_id != $request->web_id) {
        	$notify[] = ['error','Data invalid'];
        	return to_route(...$failedRedirectUrl)->withNotify($notify);
        }

        if ($request->status == 2) {
        	$notify[] = ['info','Payment in pending'];
        	return to_route(...$failedRedirectUrl)->withNotify($notify);
        }

        if ($request->status != 1) {
        	$notify[] = ['error','Data invalid'];
        	return to_route(...$failedRedirectUrl)->withNotify($notify);
        }

		if($_POST['status'] == 1 && $deposit->status == Status::PAYMENT_INITIATE && $_POST['currency'] == $deposit->method_currency ){
			PaymentController::userDataUpdate($deposit);
            $notify[] = ['success', 'Transaction is successful'];
		}else{
			$notify[] = ['error','Payment failed'];
        	return to_route(...$failedRedirectUrl)->withNotify($notify);
		}
		return to_route(...$successRedirectUrl)->withNotify($notify);
    }
}
