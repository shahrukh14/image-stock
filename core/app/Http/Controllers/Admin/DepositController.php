<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Http\Controllers\Gateway\PaymentController;
use App\Models\Donation;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function pending()
    {
        $pageTitle = 'Pending Deposits';
        $deposits = $this->depositData('pending');
        return view('admin.deposit.log', compact('pageTitle', 'deposits'));
    }


    public function approved()
    {
        $pageTitle = 'Approved Deposits';
        $deposits = $this->depositData('approved');
        return view('admin.deposit.log', compact('pageTitle', 'deposits'));
    }

    public function successful()
    {
        $pageTitle = 'Successful Deposits';
        $deposits = $this->depositData('successful');
        return view('admin.deposit.log', compact('pageTitle', 'deposits'));
    }

    public function rejected()
    {
        $pageTitle = 'Rejected Deposits';
        $deposits = $this->depositData('rejected');
        return view('admin.deposit.log', compact('pageTitle', 'deposits'));
    }

    public function initiated()
    {
        $pageTitle = 'Initiated Deposits';
        $deposits = $this->depositData('initiated');
        return view('admin.deposit.log', compact('pageTitle', 'deposits'));
    }

    public function deposit()
    {
        $pageTitle = 'Deposit History';
        $depositData = $this->depositData($scope = null, $summery = true);
        $deposits = $depositData['data'];
        $summery = $depositData['summery'];
        $successful = $summery['successful'];
        $pending = $summery['pending'];
        $rejected = $summery['rejected'];
        $initiated = $summery['initiated'];
        return view('admin.deposit.log', compact('pageTitle', 'deposits', 'successful', 'pending', 'rejected', 'initiated'));
    }

    protected function depositData($scope = null, $summery = false)
    {
        if ($scope) {
            $deposits = Deposit::$scope()->with(['user', 'gateway','donation']);
        } else {
            $deposits = Deposit::with(['user', 'gateway','donation']);
        }

        $deposits = $deposits->searchable(['trx', 'user:username', 'donation:sender'])->dateFilter();

        $request = request();

        //vai method
        if ($request->method) {
            $method = Gateway::where('alias', $request->method)->firstOrFail();
            $deposits = $deposits->where('method_code', $method->code);
        }

        if (!$summery) {
            return $deposits->orderBy('id', 'desc')->paginate(getPaginate());
        } else {
            $successful = clone $deposits;
            $pending = clone $deposits;
            $rejected = clone $deposits;
            $initiated = clone $deposits;

            $successfulSummery = $successful->where('status', Status::PAYMENT_SUCCESS)->sum('amount');
            $pendingSummery = $pending->where('status', Status::PAYMENT_PENDING)->sum('amount');
            $rejectedSummery = $rejected->where('status', Status::PAYMENT_REJECT)->sum('amount');
            $initiatedSummery = $initiated->where('status', Status::PAYMENT_INITIATE)->sum('amount');

            return [
                'data' => $deposits->orderBy('id', 'desc')->paginate(getPaginate()),
                'summery' => [
                    'successful' => $successfulSummery,
                    'pending' => $pendingSummery,
                    'rejected' => $rejectedSummery,
                    'initiated' => $initiatedSummery,
                ]
            ];
        }
    }

    public function details($id)
    {
        $general = gs();
        $deposit = Deposit::where('id', $id)->with(['user', 'gateway','donation'])->firstOrFail();

        if(!$deposit->donation_id){
            $pageTitle = $deposit->user->username.' requested ' . showAmount($deposit->amount) . ' '.gs('cur_text');
        }else{

            $pageTitle = $deposit->donation->sender->name.' donation ' . showAmount($deposit->amount) . ' '.gs('cur_text');
        }
        $details = ($deposit->detail != null) ? json_encode($deposit->detail) : null;
        
        return view('admin.deposit.detail', compact('pageTitle', 'deposit', 'details'));
    }


    public function approve($id)
    {
        $deposit = Deposit::where('id', $id)->where('status', Status::PAYMENT_PENDING)->firstOrFail();
        $notification = 'Deposit request approved successfully';
        $url = 'admin.deposit.pending';
        if ($deposit->plan_id) {
            $notification = 'Payment request approved successfully';
            $url = 'admin.payment.pending';
        }
        if ($deposit->donation_id) {
            $notification = 'Donation approved successfully';
            $url = 'admin.donation.pending';
        }

        PaymentController::userDataUpdate($deposit, true);

        $notify[] = ['success', $notification];

        return to_route($url)->withNotify($notify);
    }

    public function reject(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'message' => 'required|string|max:255'
        ]);
        $deposit = Deposit::where('id', $request->id)->where('status', Status::PAYMENT_PENDING)->firstOrFail();

        if($deposit->donation_id){
            $donation=Donation::find($deposit->donation_id);
            $donation->status =Status::DONATION_REJECT;
            $donation->save();

        }

        $deposit->admin_feedback = $request->message;
        $deposit->status = Status::PAYMENT_REJECT;
        $deposit->save();
        $notification = 'Deposit request rejected successfully';
        $url = 'admin.deposit.pending';

        if ($deposit->donation_id) {
            $notification = 'Donation request rejected successfully';
            $url = 'admin.donation.pending';

            $sender = [
                'username' => @$donation->sender->name,
                'email' => @$donation->sender->email,
                'fullname' => @$donation->sender->name,
                'mobile' => @$donation->sender->mobile,
            ];

            notify($sender, 'DONATION_REJECT', [
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'rejection_message' => $request->message
            ]);
        }

        if ($deposit->plan_id) {
            $notification = 'Payment request rejected successfully';
            $url = 'admin.payment.pending';

            notify($deposit->user, 'PAYMENT_REJECT', [
                'plan_name' => $deposit->plan->name,
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'rejection_message' => $request->message
            ]);
        } else {
            notify($deposit->user, 'DEPOSIT_REJECT', [
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'rejection_message' => $request->message
            ]);
        }

        $notify[] = ['success', $notification];
        return  to_route($url)->withNotify($notify);
    }
}
