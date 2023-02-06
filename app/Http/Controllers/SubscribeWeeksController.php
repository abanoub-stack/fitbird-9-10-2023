<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Exercise;
use Illuminate\Http\Request;

class SubscribeWeeksController extends Controller
{
    public function index()
    {
        $cats = Category::where('parent_id' , null)->orderBy('name' , 'asc')->get();
        $customers = Customer::select('id' , 'name' , 'subscription_type')->where('is_subscribed' , 1)->orderBy('name' , 'asc')->get();
        $exes = Exercise::orderBy('name' , 'asc')->get();
        return view('subscribe_week.index' , compact('cats' , 'customers' , 'exes'));
    }


    public function getExeByCategory($id , Request $request)
    {
        if($request->ajax())
        {
            $exes = Exercise::select('id' , 'name')->where('category_id', $id)->get();

            if($exes->count() > 0)
            {
                return
                [
                    'success' =>true,
                    'data' =>$exes
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }


    public function getCustomerInfo($id , Request $request)
    {
        if($request->ajax())
        {
            $customer = Customer::
                        select('id' , 'name' , 'exercise_days' , 'subscription_type' , 'subscription_started_at' , 'subscription_finished_at')
                        ->where('id', $id)
                        ->with('subscribeWeeks')
                        ->first();


            if($customer != null)
            {
                return
                [
                    'success' =>true,
                    'data' =>$customer
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }



}
