<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Lib\GoogleAuthenticator;
use App\Models\Donation;
use App\Models\Follow;
use App\Models\Form;
use App\Models\ReferralLog;
use App\Models\Transaction;
use App\Models\User;
use App\Models\EarningLog;
use App\Models\Download;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        $user = auth()->user()->load('purchasedPlan.plan', 'downloads');
        $pageTitle = 'Dashboard';

        //monthly earning report
        $report['date'] = collect([]);

        $earningMonth = EarningLog::where('earning_date', '>=', Carbon::now()->subMonth())
            ->where('contributor_id', $user->id)
            ->selectRaw("SUM(CASE WHEN contributor_id = $user->id THEN amount END) as totalAmount")
            ->selectRaw("DATE_FORMAT(earning_date,'%M-%d') as date")
            ->orderBy('date')
            ->groupBy('date')->get();

        $earningMonth->map(function ($earningData) use ($report) {
            $report['date']->push($earningData->date);
        });

        $report['date'] = dateSorting($report['date']->unique()->toArray());
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'report', 'earningMonth', 'user'));
    }

    public function depositHistory(Request $request)
    {
        if (session()->has('PLAN_PURCHASE')) {
            $session = session()->get('PLAN_PURCHASE');
            $trx = $session['trx'];
            $id = $session['plan_id'];
            session()->forget('PLAN_PURCHASE');
            return to_route('invoice', ['type' => 'plan', 'trx' => $trx, 'id' => $id]);
        }


        $pageTitle = 'Deposit History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('pageTitle', 'deposits'));
    }

    public function show2faForm()
    {
        $general = gs();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . gs('site_name'), $secret);
        $pageTitle = '2FA Setting';
        return view($this->activeTemplate . 'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);
        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $notify[] = ['success', 'Google authenticator activated successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user, $request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $notify[] = ['success', 'Two factor authenticator deactivated successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }
        return back()->withNotify($notify);
    }

    public function transactions()
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function kycForm()
    {
        if (auth()->user()->kv == 2) {
            $notify[] = ['error', 'Your KYC is under review'];
            return to_route('user.home')->withNotify($notify);
        }
        if (auth()->user()->kv == 1) {
            $notify[] = ['error', 'You are already KYC verified'];
            return to_route('user.home')->withNotify($notify);
        }
        $pageTitle = 'KYC Form';
        $form = Form::where('act', 'kyc')->first();
        return view($this->activeTemplate . 'user.kyc.form', compact('pageTitle', 'form'));
    }

    public function kycData()
    {
        $user = auth()->user();
        $pageTitle = 'KYC Data';
        return view($this->activeTemplate . 'user.kyc.info', compact('pageTitle', 'user'));
    }

    public function kycSubmit(Request $request)
    {
        $form = Form::where('act', 'kyc')->first();
        $formData = $form->form_data;
        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);
        $user = auth()->user();
        $user->kyc_data = $userData;
        $user->kv = 2;
        $user->save();

        $notify[] = ['success', 'KYC data submitted successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();
        if ($user->profile_complete == Status::YES) {
            return to_route('user.home');
        }
        $pageTitle = 'User Data';
        $info       = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries  = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user', 'mobileCode', 'countries'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();
        if ($user->profile_complete == Status::YES) {
            return to_route('user.home');
        }

        $validationRule = [
            'firstname' => 'required',
            'lastname' => 'required',
        ];
        $general = gs();

        if ($user->login_by) {
            if (!$user->email) {
                $validationRule = array_merge($validationRule, [
                    'email' => 'required|string|email|unique:users',
                ]);
            }
            $countryData    = (array)json_decode(file_get_contents(resource_path('views/partials/country.json')));
            $countryCodes   = implode(',', array_keys($countryData));
            $mobileCodes    = implode(',', array_column($countryData, 'dial_code'));
            $countries      = implode(',', array_column($countryData, 'country'));
            $validationRule = array_merge($validationRule, [
                'mobile'       => 'required|regex:/^([0-9]*)$/',
                'mobile_code'  => 'required|in:' . $mobileCodes,
                'country_code' => 'required|in:' . $countryCodes,
                'country'      => 'required|in:' . $countries,
            ]);
            $hasEmail = $user->email ? true : false;

            if (!$hasEmail) {
                $user->ev = $general->ev ? Status::NO : Status::YES;
                $user->email = $request->email;
            }
            
            $user->country_code = $request->country_code;
            $user->mobile       = $request->mobile_code . $request->mobile;
            $user->sv           = $general->sv ? Status::NO : Status::YES;
        }
        $request->validate($validationRule);


        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country' => $user->login_by ? $request->country : @$user->address->country,
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
        ];
        $user->profile_complete = Status::YES;

        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function updateFollow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'following_id' => 'required|exists:users,id',
            'status' => 'required|between:0,1',
            'append_status' => 'required|between:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $user = auth()->user();
        $follow = Follow::where('following_id', $request->following_id)->where('user_id', $user->id)->first();
        if ($request->status) {
            if (!$follow) {
                $follow = new Follow();
                $follow->user_id = $user->id;
                $follow->following_id = $request->following_id;
                $follow->save();
            }
        } else {
            if ($follow) {
                $follow->delete();
            }
        }
        if ($request->append_status) {
            $member = User::where('id', $request->following_id)->with(['followers' => function ($followers) {
                $followers->orderBy('id', 'desc')->limit(21);
            }])->withCount('followers')->first();
            $users = $member->followers;
            $relation = 'followerProfile';

            $renderedHtml = view($this->activeTemplate . 'partials.follower_following_avatar', compact('users', 'relation'))->render();

            return response()->json(['html' => $renderedHtml, 'total_followers' => $member->followers_count]);
        }

        return response()->json(['status' => 'success']);
    }

    public function referrals()
    {
        $user = User::where('id', auth()->id())->with('allReferrals')->firstOrFail();
        $pageTitle = 'Referrals';
        return view($this->activeTemplate . 'user.referral.all', compact('pageTitle', 'user'));
    }

    public function referralCommissionLog()
    {
        $general = gs();

        if (!$general->referral_system) {
            $notify[] = ['error', 'Sorry, the referral system is currently unavailable'];
            return back()->withNotify($notify);
        }

        $pageTitle = "Referral Logs";

        $logs = ReferralLog::where('user_id', auth()->id())->with('referee')->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.referral.log', compact('pageTitle', 'logs'));
    }

    public function earningLog()
    {
        $pageTitle = 'Earning Logs';
        $logs      = EarningLog::where('contributor_id', auth()->id())->with('imageFile')->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.earning_logs', compact('pageTitle', 'logs'));
    }

    public function downloadHistory()
    {
        $pageTitle = 'Download History';
        $downloads = Download::where('user_id', auth()->id())->with('imageFile.image:title,id,category_id', 'imageFile.image.category:id,name', 'contributor', 'imageFile')->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.download_history', compact('pageTitle', 'downloads'));
    }


    public function donationHistory()
    {
        $pageTitle = "Donation History";
        $donations = Donation::where('receiver_id', auth()->user()->id)->where('status', 1)->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.donation_log', compact('donations', 'pageTitle'));
    }
}
