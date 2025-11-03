<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageContributorController extends Controller
{
    public function all()
    {
        $pageTitle = 'All Contributor';
        $contributors = User::where('user_status', 0)->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.contributors', compact('pageTitle', 'contributors'));
    }

    public function updateStatus($id)
    {
        $contributor = User::findOrFail($id);
        if($contributor->role == 1){
            $role = 2;
        }else{
            $role = 1;
        }
        $contributor->user_status = $contributor->user_status ? 0 : 1;
        $contributor->role = $role;
        $contributor->save();

        $notification = 'Contributor Approved successfully';
        if ($contributor->status) {
            $notification = 'contributor UnApproved Successfully';
        }

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function save(Request $request, $id = 0)
    {
        $passwordValidation = 'required';
        if ($id) {
            $passwordValidation = 'nullable';
        }
        $request->validate([
            'name' => 'required|string|max:40',
            'username' => 'required|string|max:40|unique:reviewers,username,' . $id,
            'email' => 'required|email|unique:reviewers,email,' . $id,
            'password' => $passwordValidation
        ]);

        $reviewer = new Reviewer();
        $notification = 'Reviewer added successfully';

        if ($id) {
            $reviewer = Reviewer::findOrFail($id);
            $notification = 'Reviewer updated successfully';
            
            if ($request->password) {
                notify($reviewer, 'REVIEWER_PASSWORD_UPDATE', [
                    'time' => showDateTime(now(), 'd M, Y h:i A')
                ]);
                $reviewer->password = Hash::make($request->password);
            }
        } else {
            notify($reviewer, 'REVIEWER_CREATED', [
                'time' => showDateTime(now(), 'd M, Y h:i A')
            ]);
            $reviewer->status = 1;
        }

        $reviewer->name = $request->name;
        $reviewer->email = $request->email;
        $reviewer->username = $request->username;
        $reviewer->save();


        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function login($id)
    {
        $reviewer = Reviewer::where('status', 1)->findOrFail($id);
        Auth::guard('reviewer')->loginUsingId($reviewer->id);
        return to_route('reviewer.dashboard');
    }
}
