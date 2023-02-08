<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\HistoryPayment;
use App\Models\Progress;
use App\Models\SubscribeWeeks;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::orderBy('id', 'desc')->paginate(10);
        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function user($uId)
    {
        $user = Customer::findOrFail($uId);


        // Report Section

           //Current Week
           $dates = Progress::orderBy('progress_date' , 'desc')->where('customer_id', $user->id)
                   ->whereBetween('progress_date',
                   [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                   )->pluck('progress_date');

            $cals = Progress::orderBy('progress_date' , 'desc')->where('customer_id', $user->id)
            ->whereBetween('progress_date',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->pluck('calories')->all();


            $formattedDates = $dates->map(function ($date) {
                return $date->format('d-m-Y');
            });



        $keys = $formattedDates;
        $values = $cals;

        $description =$user->name . "'s Losted Calories in This Current Week " ;
        //    End Report Section


        return view('user.user', [
            'user' => $user,
            'keys' => $keys,
            'values' => $values,
            'description' => $description,
        ]);
    }

    public function premiumUsers()
    {
        $premiumUsers = Customer::where('is_subscribed', '=', '1')->paginate(10);
        return view('user.premium', [
            'users' => $premiumUsers,
        ]);
    }

    public function editPremiumUser($userId)
    {
        $user = Customer::findOrFail($userId);
        return view('user.edit-premium', [
            'user' => $user,
        ]);
    }

    public function editPremiumUserPost(Request $request, $userId)
    {
        $request->validate([
            'subscription_type' => 'required|in:month,three_months,six_months,year',
            'subscription_started_at' => 'required|date',
            'subscription_finished_at' => 'required|date',
        ]);

        $user = Customer::findOrFail($userId);
        if ($request->has('disable')) {
            $user->update([
                'is_subscribed' => '0',
            ]);
            return redirect(url('/users/premium'));
        }
        $user->update([
            'subscription_type' => $request->subscription_type,
            'subscription_started_at' => $request->subscription_started_at,
            'subscription_finished_at' => $request->subscription_finished_at,
        ]);
        return redirect(url('/users/premium'));
    }

    public function assignSubscription()
    {
        return view('user.assign');
    }

    public function assignSubscriptionPost(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|numeric|exists:customers,id',
            'subscription_type' => 'required|in:month,three_months,six_months,year',
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $startedAt = date("Y-m-d h:i:s", time());
        if ($request->subscription_type == 'month') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 month"));
        } elseif ($request->subscription_type == 'three_months') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+3 month"));
        } elseif ($request->subscription_type == 'six_months') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+6 month"));
        } elseif ($request->subscription_type == 'year') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 year"));
        }

        // $hourDiff = (strtotime($startedAt));
        // dd($hourDiff);

        HistoryPayment::create([
            'user_id' => $customer->id,
            'date_time' => "From $startedAt To $finishedAt",
            'amount' => null,
        ]);

        $customer->update([
            'is_subscribed' => '1',
            'subscription_type' => $request->subscription_type,
            'subscription_started_at' => $startedAt,
            'subscription_finished_at' => $finishedAt,
        ]);

        //Create Weeks of subscribe

        $weeks_number = 0;
        if ($customer->subscription_type =="month") {
            $weeks_number = 4;
        }


        elseif ($customer->subscription_type == "three_months") {
            $weeks_number = 12;
        }


        elseif ($customer->subscription_type == "six_months") {
            $weeks_number = 24;
        }

        elseif ($customer->subscription_type == "year") {
            $weeks_number = 48;
        }
        $weeks_array = [];
        for($i =1 ; $i<= $weeks_number; $i++)
        {
            for($j =1 ; $j<= 7; $j++)
            {
                $weeks_array [$i][$j] =
                    [
                        //exe array associative array with exe_id => completed or not
                        'exe_array' =>
                            [

                                // 12 => true,
                                // 14 => false,

                            ],

                            'is_completed' => false,

                    ];
            }
        }


        $weeks_subscribe = SubscribeWeeks::create(
            [
                'customer_id' => $customer->id,
                'data' => json_encode($weeks_array),
            ]
        );

        //Create Weeks of subscribe END


        return redirect(url('/users/premium'))->with('success', $customer->name . ' Subscribed Successfully!');
    }



    public function delete($uId)
    {
        $user = Customer::findOrFail($uId);
        $user->delete();
        return back()->with('success', "User deleted Successfully");
    }



    public function edit($uId)
    {
        $user = Customer::findOrFail($uId);
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        $user = Customer::findOrFail($request->customer_id);

        $validator = Validator::make($request->all(), [
            'customer_id' => 'exists:customers,id|required',
            'email' => 'email|required',
            'name' => 'required|string',
            'phone' => 'required|min:11',
            'gender' => 'required|in:Male,Female,male,female',
            'workout_intensity' => 'required',
            'age' => 'required|min:0|integer',
            'height' => 'required|min:0|numeric',
            'exercise_days' => 'required|string',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'nullable|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $data = $request->except(['password', 'password_confirmation' , '_token']);
        $user->update($data);

        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success' , 'User Informations Updated Successfully With The New Password');
        }



        return back()->with('success' , 'User Informations Updated Successfully With Same Password');
    }


    public function searchUsers(Request $request)
    {
        $key = $request->keyword;
        $users = Customer::where('name', 'LIKE', "%$key%")
            ->orWhere('email', 'LIKE', "%$key%")
            ->orWhere('phone', 'LIKE', "%$key%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('user.index', [
            'users' => $users,
        ]);
    }





}
