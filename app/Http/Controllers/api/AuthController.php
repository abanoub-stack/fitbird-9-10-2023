<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        # Customer
        #// Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50|unique:customers,email',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required|string|min:4|max:50',
            'phone' => 'nullable|string',
            'gender' => 'nullable|string|max:6',
            'password' => 'required|string|min:5|max:64',
            'age' => 'nullable|string|max:90',
            'height' => 'nullable|string|max:300',
            'exercise_days' => 'nullable|string',
            'workout_intensity' => 'nullable|string|max:255',

            'goals' => 'nullable|string|max:255',
            'activity' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:300',

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
            'is_subscribed' => '0',
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

    public function facebookLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'token' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ] , 400);
        }

        $facebook_token = $request->token;

        try{
            $providerUser = Socialite::driver('facebook')->userFromToken($facebook_token);
        }
        catch(Exception $e ){
            return response()->json([
                'success' => false,
                'message' => 'wrong facebook token',
                'error' => $e->getMessage(),
            ] , 500);
        }

        $providerUserId  = $providerUser->id;
        $user  = Customer:: where('provider_name', 'facebook' )
                            ->where('provider_id' , $providerUserId)
                            ->first();

        if(!$user)
        {
            $access_token = Str::random(128);
            $customer = Customer::create([
                'name' => $providerUser->name,
                'provider_name' => 'facebook',
                'provider_id' => $providerUserId,
                'avatar' => "https://graph.facebook.com/v3.3/$providerUserId/picture?type=large&access_token=$facebook_token",
                'access_token' => $access_token,

            ]);

            return response()->json([
                'success' => true,
                'access_token' => $customer->access_token,
                'user' => new CustomerResource($customer),
            ]);
        }
        else
        {
            return response()->json([
                'success' => true,
                'message' => 'user exist',
                'access_token' => $user->access_token,
                'user' => new CustomerResource($user),
            ]);
        }
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
            'height' => 'nullable|min:0|numeric',
            'exercise_days' => 'nullable|string',
            'password' => 'nullable|min:5',
            'password_confirmation' => 'nullable|min:5|same:password',
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


    public function getSubData(Request $request)
    {
        $user = Customer::where('access_token' , $request->header('access-token'))->first();
        $data =
        [
            'id' => $user->id ,
            'name' => $user->name ,
            'is_subscribed' => $user->is_subscribed == "0" ? 0 : 1,
            'subscription_type' => $user->subscription_type,
            'subscription_started_at' => $user->subscription_started_at,
            'subscription_finished_at' => $user->subscription_finished_at,
        ];

        return response()->json(
            [
                'success' => true,
                'data' => $data
            ] , 200
        );
    }

    public function getUserInfo($id)
    {
        $user = Customer::find($id);
        if($user != null)
        {
            $user = new CustomerResource($user);
            return response()->json([
                 'success' => true,
                 'message' => 'Data Sent Successfully',
                 'data' => $user,
            ]);
        }
        else
        {
            return response()->json([
                 'success' => false,
                 'message' => 'User Not Found',
            ] , 404 );
        }
    }

    public function CheckEmail(Request $request)
    {
        $validator = Validator::make($request->all()
        ,
        [
            'email'  => 'email|required|unique:customers,email'
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ] , 400
            );
        }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'message' => "Email Not Exist In Our Recoreds , User Can SignUp With It.",
                ]
            );
        }
    }



    public function checkExistEmail(Request $request)
    {
        $validator = Validator::make($request->all()
        ,
        [
            'email'  => 'email|required|exists:customers,email'
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ] , 400
            );
        }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'user email exists and the rest password mail has been sent.'
                ]
            );
        }
    }


}
