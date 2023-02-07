<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeWeeksController extends Controller
{
    public function index()
    {
        $cats = Category::where('parent_id' , null)->orderBy('name' , 'asc')->get();
        $customers = Customer::select('id' , 'name' , 'subscription_type')->where('is_subscribed' , 1)->orderBy('name' , 'asc')->get();
        $exes = Exercise::orderBy('name' , 'asc')->get();
        return view('subscribe_week.index' , compact('cats' , 'customers' , 'exes'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'customer_id' => 'required|numeric|exists:customers,id',
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7',
        ]);

        if ($validator->fails())
            {

            }
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



    //API functions
    public function getByToken(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $data = $user->subscribeWeeks()->first();
        if($data != null)
        {
            $weeks = json_decode($data->data);
            return response()->json(
                [
                    'success' => true,
                    'data' => $weeks,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }


    public function getByWeekDay(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7'
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }
        $week = $request->week;
        $day = $request->day;
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_day = $weeks[$week][$day];
            return response()->json(
                [
                    'success' => true,
                    'exe_array' => $requested_day['exe_array'],
                    'is_completed' => $requested_day['is_completed'],
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }

    public function getNumberOfSubWeeks(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $data = $user->subscribeWeeks()->first();
        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $weeks_number = count($weeks);
            return response()->json(
                [
                    'success' => true,
                    'number_of_weeks' => $weeks_number,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }




}
