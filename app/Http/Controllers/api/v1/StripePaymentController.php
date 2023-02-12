<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\HistoryPayment;
use App\Models\Price;
use App\Models\SubscribeWeeks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StripePaymentController extends Controller
{

    // Month
    public function subscribeMonth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'credit_card' => 'required',
            'exp_month' => 'required|string',
            'exp_year' => 'required|string',
            'cvc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->credit_card,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            $desc = "user ($user->name | $user->phone | $user->email) subscribed for a month successfully";
            $response = $stripe->charges->create([
                'amount' => Price::first()->price * 100,
                'currency' => 'egp',
                'source' => $res->id,
                'description' => $desc,
            ]);

            if ($response->status !== 'succeeded') {
                return response()->json([
                    'response_status' => $response->status,
                    'response' => 401,
                ], 401);
            }

            // Do something here to subscribe in our tables
            $startedAt = date("Y-m-d h:i:s", time());
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 month"));
            $user->update([
                'is_subscribed' => 1,
                'subscription_type' => 'month',
                'subscription_started_at' => $startedAt,
                'subscription_finished_at' => $finishedAt,
            ]);

            HistoryPayment::create([
                'user_id' => $user->id,
                'date_time' => "From $startedAt To $finishedAt",
                'amount' => Price::first()->price,
            ]);


            //Create Weeks of subscribe
            $weeks_number = 0;
            if ($user->subscription_type =="month") {
                $weeks_number = 4;
            }


            elseif ($user->subscription_type == "three_months") {
                $weeks_number = 12;
            }


            elseif ($user->subscription_type == "six_months") {
                $weeks_number = 24;
            }

            elseif ($user->subscription_type == "year") {
                $weeks_number = 48;
            }
            $weeks_array = [];
            for($i =1 ; $i<= $weeks_number; $i++)
            {
                for($j =1 ; $j<= 7; $j++)
                {
                    $weeks_array [$i][$j] =
                        [
                            'category_id' => null ,
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



        $old_sub = SubscribeWeeks::where('customer_id' , $user->id)->first();

        if($old_sub)
            {
                $user->subscribeWeeks()->update(
                    [
                        'data' => json_encode($weeks_array),
                    ]
                );
            }
        else
            {
                $weeks_subscribe = SubscribeWeeks::create(
                    [
                        'customer_id' => $user->id,
                        'data' => json_encode($weeks_array),
                    ]
                );
            }

            //Create Weeks of subscribe END







            return response()->json([
                'response_status' => $response->status,
                'response' => 200,
                'data' => $desc,
            ], 200);

        } catch (\Throwable$th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }
    }

    // Three Months
    public function subscribeThreeMonths(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'credit_card' => 'required',
            'exp_month' => 'required|string',
            'exp_year' => 'required|string',
            'cvc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->credit_card,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            $desc = "user ($user->name | $user->phone | $user->email) subscribed for 3 months successfully";
            $response = $stripe->charges->create([
                'amount' => Price::first()->price_three_months * 100,
                'currency' => 'egp',
                'source' => $res->id,
                'description' => $desc,
            ]);
            if ($response->status !== 'succeeded') {
                return response()->json([
                    'response_status' => $response->status,
                    'response' => 401,
                ], 401);
            }
            // Do something here to subscribe in our tables
            $startedAt = date("Y-m-d h:i:s", time());
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+3 month"));
            $user->update([
                'is_subscribed' => 1,
                'subscription_type' => 'three_months',
                'subscription_started_at' => $startedAt,
                'subscription_finished_at' => $finishedAt,
            ]);

            HistoryPayment::create([
                'user_id' => $user->id,
                'date_time' => "From $startedAt To $finishedAt",
                'amount' => Price::first()->price_three_months,
            ]);


                        //Create Weeks of subscribe
                        $weeks_number = 0;
                        if ($user->subscription_type =="month") {
                            $weeks_number = 4;
                        }


                        elseif ($user->subscription_type == "three_months") {
                            $weeks_number = 12;
                        }


                        elseif ($user->subscription_type == "six_months") {
                            $weeks_number = 24;
                        }

                        elseif ($user->subscription_type == "year") {
                            $weeks_number = 48;
                        }
                        $weeks_array = [];
                        for($i =1 ; $i<= $weeks_number; $i++)
                        {
                            for($j =1 ; $j<= 7; $j++)
                            {
                                $weeks_array [$i][$j] =
                                    [
                                        'category_id' => null ,
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
                                'customer_id' => $user->id,
                                'data' => json_encode($weeks_array),
                            ]
                        );

                        //Create Weeks of subscribe END


            return response()->json([
                'response_status' => $response->status,
                'response' => 200,
                'data' => $desc,
            ], 200);

        } catch (\Throwable$th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }
    }

    // Six Months
    public function subscribeSixMonths(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'credit_card' => 'required',
            'exp_month' => 'required|string',
            'exp_year' => 'required|string',
            'cvc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->credit_card,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            $desc = "user ($user->name | $user->phone | $user->email) subscribed for 6 months successfully";
            $response = $stripe->charges->create([
                'amount' => Price::first()->price_six_months * 100,
                'currency' => 'egp',
                'source' => $res->id,
                'description' => $desc,
            ]);
            if ($response->status !== 'succeeded') {
                return response()->json([
                    'response_status' => $response->status,
                    'response' => 401,
                ], 401);
            }

            // Do something here to subscribe in our tables
            $startedAt = date("Y-m-d h:i:s", time());
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+6 month"));
            $user->update([
                'is_subscribed' => 1,
                'subscription_type' => 'six_months',
                'subscription_started_at' => $startedAt,
                'subscription_finished_at' => $finishedAt,
            ]);

            HistoryPayment::create([
                'user_id' => $user->id,
                'date_time' => "From $startedAt To $finishedAt",
                'amount' => Price::first()->price_six_months,
            ]);

            //Create Weeks of subscribe
            $weeks_number = 0;
            if ($user->subscription_type =="month") {
                $weeks_number = 4;
            }


            elseif ($user->subscription_type == "three_months") {
                $weeks_number = 12;
            }


            elseif ($user->subscription_type == "six_months") {
                $weeks_number = 24;
            }

            elseif ($user->subscription_type == "year") {
                $weeks_number = 48;
            }
            $weeks_array = [];
            for($i =1 ; $i<= $weeks_number; $i++)
            {
                for($j =1 ; $j<= 7; $j++)
                {
                    $weeks_array [$i][$j] =
                        [
                            'category_id' => null ,
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


        $old_sub = SubscribeWeeks::where('customer_id' , $user->id)->first();

        if($old_sub)
            {
                $user->subscribeWeeks()->update(
                    [
                        'data' => json_encode($weeks_array),
                    ]
                );
            }
        else
            {
                $weeks_subscribe = SubscribeWeeks::create(
                    [
                        'customer_id' => $user->id,
                        'data' => json_encode($weeks_array),
                    ]
                );
            }
            //Create Weeks of subscribe END

            return response()->json([
                'response_status' => $response->status,
                'response' => 200,
                'data' => $desc,
            ], 200);

        } catch (\Throwable$th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }
    }

    // year
    public function subscribeYear(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'credit_card' => 'required',
            'exp_month' => 'required|string',
            'exp_year' => 'required|string',
            'cvc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->credit_card,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            $desc = "user ($user->name | $user->phone | $user->email) subscribed for a year successfully";
            $response = $stripe->charges->create([
                'amount' => Price::first()->price_year * 100,
                'currency' => 'egp',
                'source' => $res->id,
                'description' => $desc,
            ]);
            if ($response->status !== 'succeeded') {
                return response()->json([
                    'response_status' => $response->status,
                    'response' => 401,
                ], 401);
            }

            // Do something here to subscribe in our tables
            $startedAt = date("Y-m-d h:i:s", time());
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 year"));
            $user->update([
                'is_subscribed' => 1,
                'subscription_type' => 'year',
                'subscription_started_at' => $startedAt,
                'subscription_finished_at' => $finishedAt,
            ]);

            HistoryPayment::create([
                'user_id' => $user->id,
                'date_time' => "From $startedAt To $finishedAt",
                'amount' => Price::first()->price_year,
            ]);


            //Create Weeks of subscribe
            $weeks_number = 0;
            if ($user->subscription_type =="month") {
                $weeks_number = 4;
            }


            elseif ($user->subscription_type == "three_months") {
                $weeks_number = 12;
            }


            elseif ($user->subscription_type == "six_months") {
                $weeks_number = 24;
            }

            elseif ($user->subscription_type == "year") {
                $weeks_number = 48;
            }
            $weeks_array = [];
            for($i =1 ; $i<= $weeks_number; $i++)
            {
                for($j =1 ; $j<= 7; $j++)
                {
                    $weeks_array [$i][$j] =
                        [
                            'category_id' => null ,
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


        $old_sub = SubscribeWeeks::where('customer_id' , $user->id)->first();

        if($old_sub)
            {
                $user->subscribeWeeks()->update(
                    [
                        'data' => json_encode($weeks_array),
                    ]
                );
            }
        else
            {
                $weeks_subscribe = SubscribeWeeks::create(
                    [
                        'customer_id' => $user->id,
                        'data' => json_encode($weeks_array),
                    ]
                );
            }
            //Create Weeks of subscribe END

            return response()->json([
                'response_status' => $response->status,
                'response' => 200,
                'data' => $desc,
            ], 200);

            // Do something here to subscribe in our tables

        } catch (\Throwable$th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }

    }

}
