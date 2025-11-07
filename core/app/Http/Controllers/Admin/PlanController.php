<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanController extends Controller
{
    public function allPlan()
    {
        $pageTitle = 'All Plan';
        $plans     = Plan::searchable(['name'])->orderBy('name')->paginate(getPaginate());
        return view('admin.plan.index', compact('pageTitle', 'plans'));
    }

    public function store(Request $request, $id = 0)
    {
        $this->validation($request, $id);

        if ($id) {
            $plan           = Plan::findOrFail($id);
            $notification   = 'Plan updated successfully';
            $images         =  $plan->image;
        } else {
            $plan           = new Plan();
            $notification   = 'Plan added successfully';
            $images  = [];
        }

        $folder_path = public_path('assets/image/plan_images');
        if (!File::exists($folder_path)) {
            File::makeDirectory($folder_path, 0777, true, true);
        }
       
        if ($request->image){
            $images  = [];
            foreach(($request->image) AS $photo){
                $sl = rand();
                $imageName =  date('Ymd').'_'.$sl.'.'.$photo->getClientOriginalExtension();
                $photo->move($folder_path, $imageName);
                $images[] = $imageName;
            }
            $images = json_encode($images);
        }

        $plan->name          = $request->name;
        $plan->title         = $request->title;
        $plan->monthly_price = $request->monthly_price;
        $plan->yearly_price  = $request->yearly_price;
        $plan->daily_limit   = $request->daily_limit;
        $plan->monthly_limit = $request->monthly_limit;
        $plan->image         = $images;
        $plan->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Plan::changeStatus($id);
    }

    private function validation($request, $id)
    {
        $request->validate([
            'name'          => 'required|max:40|unique:plans,id,' . $id,
            'title'         => 'required|string|max:255',
            // 'monthly_price' => 'required|numeric|gte:0',
            'yearly_price'  => 'required|numeric|gte:0',
            'daily_limit'   => 'required|integer|gte:-1',
            'monthly_limit' => 'required|integer|gte:-1'
        ], [
            'daily_limit.required' => 'Daily limit field is required',
            'daily_limit.integer'   => 'Daily limit must be an integer',
            'daily_limit.gte'   => 'Daily limit can\'t be less than -1',
            'monthly_limit.required' => 'Monthly limit field is required',
            'monthly_limit.integer'   => 'Monthly limit must be an integer',
            'monthly_limit.gte'   => 'Monthly limit can\'t be less than -1'
        ]);
    }
}
