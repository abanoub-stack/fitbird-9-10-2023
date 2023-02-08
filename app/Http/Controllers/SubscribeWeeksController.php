<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExerciseResourse;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Exercise;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeWeeksController extends Controller
{
    public function index()
    {
        $cats = Category::where('parent_id' , null)->orderBy('name' , 'asc')->get();
        $customers = Customer::select('id' , 'name' , 'subscription_type')->where('is_subscribed' , 1)->orderBy('name' , 'asc')->get();
        $exes = Exercise::orderBy('name' , 'asc')->with('Category')->get();
        return view('subscribe_week.index' , compact('cats' , 'customers' , 'exes'));
    }

    public function save(Request $request)
    {
        if($request->ajax())
        {
            $validator = Validator::make($request->all(),
            [
                'customer_id' => 'required|numeric|exists:customers,id',
                'week' => 'required|numeric|min:1|max:48',
                'day' => 'required|numeric|min:1|max:7',
                "exercises"    => "required|array",
                "exercises.*"  => "required|exists:exercises,id",
            ] ,
            [
                'customer_id' => "Please Select Customer First",
                'week' => "Please Select Week",
                'day' => "Please Select Day",
                "exercises"    => "Please Select Some exercises",
            ]
        );

            if ($validator->fails())
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()->first(),
                    ]);
            }

            $week = $request->week;
            $day = $request->day;
            $exercises = $request->exercises;
            $customer = Customer::find($request->customer_id);
            $data = $customer->subscribeWeeks()->first();



            if($data != null)
            {
                $weeks = json_decode($data->data , true);

                $old_exe = array_keys($weeks[$week][$day]['exe_array']);
                $exercises = array_merge($exercises , $old_exe);


                $new_array = [];
                for($i=0 ; $i< count($exercises) ; $i++)
                {
                    $new_array[$exercises[$i]] = false;
                }
                $weeks[$week][$day]['exe_array'] = $new_array;
                $customer->subscribeWeeks()->update(['data' => json_encode($weeks)]);


                return response()->json(
                    [
                        'success' => true,
                        'message' => "Exercises Assigned Successfully."
                    ]);
            }
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


            //Handle Dates
            $s_date = explode( '-' ,$customer->subscription_started_at);
            $s_date[2] = explode( " " ,$s_date[2])[0];

            $f_date = explode( '-' ,$customer->subscription_finished_at);
            $f_date[2] = explode( " " ,$s_date[2])[0];

            $subscription_started_at = Carbon::createFromFormat('Y/m/d', $s_date[0]."/".$s_date[1]."/".$s_date[2])->format('Y M:d');
            $subscription_finished_at = Carbon::createFromFormat('Y/m/d', $f_date[0]."/".$f_date[1]."/".$f_date[2])->format('Y M:d');
            $customer->subscription_started_at = $subscription_started_at;
            $customer->subscription_finished_at = $subscription_finished_at;
            //Handle Dates

            //Add Customer Workouts (number of weeks * exedays)

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
            $exes = Exercise::whereIn('id' , array_keys($requested_day['exe_array']))->get();
            $exe = new ExerciseResourse($exes);
            return response()->json(
                [
                    'success' => true,
                    'exes' =>$exes,
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



    public function CompleteDay(Request $request)
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
            $weeks[$week][$day]['is_completed'] = true;
            $user->subscribeWeeks()->update(['data' => json_encode($weeks)]);
            // dd(json_decode($user->subscribeWeeks()->first()->data));
            return response()->json(
                [
                    'success' => true,
                    'message' => "Day Updated Successfully",
                    'data' => $weeks[$week][$day],
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
