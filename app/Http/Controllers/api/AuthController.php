<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        # Customer
        #// Validation
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|max:50|unique:customers,email',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required|string|min:4|max:50',
            'phone' => 'required|string',
            'gender' => 'required|string|max:6',
            'password' => 'required|string|min:4|max:64',
            'age' => 'required|string|max:90',
            'height' => 'required|string|max:300',
            'exercise_days' => 'required|string',
            'workout_intensity' => 'required|string|max:255',

            'goals' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'weight' => 'required|string|max:300',

            //
            # Address
            // 'customer_id',
            'city' => 'nullable|string|max:50',
            'country' => 'nullable|string|min:2|max:2',
            'line1' => 'nullable|string|max:255',
            'line2' => 'nullable|string|max:255',
            'postal_code' => 'nullable|numeric|min:111|max:9999',
            'state' => 'nullable|string|max:64',
            //
        ]);
        // Check Vakidation
        if ($validator->fails()) {
            return response()->json([
                'required' => $validator->errors(),
            ]);
        }

        // Do Success Tables Creation After Validation
        // Access Token
        $access_token = Str::random(128);

        // # Customer
        $customer = Customer::create([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'workout_intensity' => $request->workout_intensity,

            'goals' => $request->goals,
            'activity' => $request->activity,
            'weight' => $request->weight,


            'age' => $request->age,
            'height' => $request->height,
            'exercise_days' => $request->exercise_days,
            'password' => bcrypt($request->password),
            'access_token' => $access_token,
        ]);

        //Image

        if($request->hasFile('image'))
        {
            $newImgName = $request->file('image')->hashName();
            $request->image->move(public_path('app_images/customers'), $newImgName);
            $customer->image = "app_images/customers/".$newImgName;
            $customer->save();
        }


        // Address
        $address = Address::create([
            'customer_id' => $customer->id,
            'city' => $request->city,
            'country' => $request->country,
            'line1' => $request->line1,
            'line2' => $request->line2 ?? null,
            'postal_code' => $request->postal_code,
            'state' => $request->state,
        ]);
        CustomerNotification::create([
            'user' => "$customer->email",
            'message' => __('added address in registration'),
        ]);
        // Return success data
        $data['success'] = '1';
        $data['register'] = new CustomerResource($customer);
        return response()->json([
            "data" => $data,
            'access_token' => $access_token,
        ]);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_or_phone_or_email' => 'required|string|max:255',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }
        $user = Customer::where('name', '=', $request->name_or_phone_or_email)
            ->orWhere('email', '=', $request->name_or_phone_or_email)
            ->orWhere('phone', '=', $request->name_or_phone_or_email)
            ->first();
        $access_token = Str::random(128);

        if (!$user) {
            return response()->json([
                'error' => __('user not found'),
            ]);
        }
        if ($user->access_token !== null && Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => __('user already logged in'),
                'user' => new CustomerResource($user),
                'access_token' => $user->access_token,
            ]);
        }
        $password = $request->password;
        $isCorrect = Hash::check($password, $user->password);
        if (!$isCorrect) {
            return response()->json([
                'error' => __('password not correct'),
            ]);
        }
        $user->update([
            'access_token' => $access_token,
        ]);
        CustomerNotification::create([
            'user' => "$user->email",
            'message' => __('logged in'),
        ]);
        return response()->json([
            'message' => __('user logged in successfully'),
            'user' => new CustomerResource($user),
            'access_token' => $access_token,
            'next_request' => url('api/v1'),
            'user' => new CustomerResource($user),
        ]);
    }

    public function logout(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $user->update([
            'access_token' => null,
        ]);
        CustomerNotification::create([
            'user' => $user->email,
            'message' => __('logged out'),
        ]);
        return response()->json([
            'message' => __('user logged out successfully'),
            'next_request' => url('api/login'),
        ]);
    }

    public function schedule(Schedule $schedule, Request $request)
    {
        if ($request->header('access_token')) {
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            if ($user) {
                $schedule->command($user->update([
                    'access_token' => null,
                ]))->everyTwoMinutes();
            }
        }
    }


    public function editProfileApi(Request $request)
    {
        $user = Customer::where( 'access_token' , $request->header('access-token'))->first();
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required|string',
            'phone' => 'required|min:11',
            'gender' => 'required|in:Male,Female,male,female',
            'workout_intensity' => 'required',

            'goals' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'weight' => 'required|string|max:300',


            'age' => 'required|min:0|integer',
            'height' => 'required|min:0|numeric',
            'exercise_days' => 'required|string',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'nullable|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $data = $request->except(['password', 'password_confirmation', 'image' , '_token']);
        $user->update($data);




        if ($request->hasFile('image')) {
            $newImgName = $request->file('image')->hashName();
            $request->image->move(public_path('app_images/customers'), $newImgName);
            $user->image = "app_images/customers/" . $newImgName;
            $user->save();
        }



        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
            $user->save();


            return response()->json([
                'success' => true,
                'message' => 'User Informations Updated Successfully With The New Password',
                'data' => new CustomerResource($user),
            ]);
        }



        return response()->json([
            'success' => true,
            'message' => 'User Informations Updated Successfully With Same  Password',
            'data' => new CustomerResource($user),

        ]);
    }

}
