<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;


class CouponController extends Controller
{
    public function couponCode(){
        $pageTitle = "Coupon Code";
        $coupons = Coupon::searchable(['coupon'])->orderBy('id', 'DESC')->paginate(getPaginate());;
        return view('admin.coupon.index', compact('pageTitle', 'coupons'));
    }

    public function store(Request $request, $id = 0){
        $this->validation($request, $id);
        if ($id) {
            $coupon         = Coupon::findOrFail($id);
            $notification   = 'Coupon updated successfully';
        } else {
            $coupon         = new Coupon();
            $notification   = 'Coupon added successfully';
        }

        $coupon->coupon             = $request->coupon;
        $coupon->code               = $request->code;
        $coupon->type               = $request->type;
        $coupon->discount           = $request->discount;
        $coupon->coupon_for         = $request->coupon_for;
        $coupon->start_date         = $request->start_date;
        $coupon->expiry_date        = $request->expiry_date;
        $coupon->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    private function validation($request, $id)
    {
        $request->validate([
            'coupon'        => 'required',
            'code'          => 'required|string|max:255',
            'type'          => 'required',
            'discount'      => 'required|integer|gt:0',
            'start_date'    => 'required|date|date_format:Y-m-d|after:yesterday',
            'expiry_date'   => 'required|date|after_or_equal:start_date',
        ], [
            'discount.required'             => 'Discount field is required',
            'discount.integer'              => 'Discount must be an integer',
            'discount.gt'                   => 'Discount must be an greater than 0',
            'start_date.required'           => 'Start Date field is required',
            'start_date.date'               => 'Start Date field must be a date',
            'start_date.date_format'        => 'Start Date format must be YYYY/MM/DD',
            'start_date.after'              => 'Start Date must be greater than yesterday',
            'expiry_date.required'          => 'Expiry Date field is required',
            'expiry_date.date'              => 'Expiry Date field must be a date',
            'expiry_date.after_or_equal'    => 'Expiry Date must be greater than Start Date',
        ]);
    }

    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        $notify[] = ['success', 'Coupon deleted Successfully'];
        return back()->withNotify($notify);
    }
}
