<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResource;
use App\Models\Address;
use App\Models\Credit_card;
use App\Models\Customer;
use App\Models\CustomerNotification;
use App\Models\Price;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestStripePaymentController extends Controller
{
    public function checkout1(Request $request)
    {
        # Vars
        // datetime
        // h:i:s A
        $dt = date("Y-m-d h:i:s");
        $trial_ends_at = date("Y-m-d h:i:s", strtotime("$dt +7 days"));
        $ends_at = date("Y-m-d h:i:s", strtotime("$dt +1 month"));
        // user
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        // credit card
        $credit_card = Credit_card::where('customer_id', '=', $user->id)->first();
        // url
        $url = url();

        // description
        $description = "user $user->name has subscribed for a month \n started at $dt \n ends at $ends_at";
        // user_address
        $user_address = Address::where('customer_id', '=', $user->id)->first();

        // check if user already subscribed
        $userIsSubscriped = DB::table('subscriptions')->where('user_id', '=', $user->id)->get();
        if ($userIsSubscriped->count() > 0) {
            $subscriptionn = $userIsSubscriped->first()->ends_at;
            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('tried to subscribe but he already registered'),
            ]);
            return response()->json([
                'message' => "user $user->name already registered",
                'registration_started_at' => date("Y-m-d h:i:s", strtotime("$subscriptionn -1 month")),
                'registeration_ends_at' => $userIsSubscriped->first()->ends_at,
                'cancel_registration' => url('api/v1/cancel-registration'),
                'next_request' => url('api/v1'),
            ]);
        }

        // Stripe
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Validation
        $validator = Validator::make($request->all(), [
            // 'price' => 'required|numeric|min:20',
            // 'currency' => 'required|string|min:2|max:4',
            // 'card_no' => 'required',
            // 'exp_month' => 'required',
            // 'exp_year' => 'required',
            // 'cvc' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'required' => $validator->errors(),
            ]);
        }

        // Do Operation
        // $amount = $request->price;
        $amount = Price::all()->first()->price;
        $amount *= 100;
        $price = (int) $amount;

        $currencies = ['USD', 'AED'];
        // if (!in_array($request->currency, $currencies)) {
        // return response()->json([
        // 'error' => __('enter a valid currency'),
        // ]);
        // }

        try {
            $method = \Stripe\PaymentMethod::create(array([
                'type' => 'card',
                'card' => [
                    'number' => $credit_card->card_no,
                    'exp_month' => $credit_card->exp_month,
                    'exp_year' => $credit_card->exp_year,
                    'cvc' => $credit_card->cvc,
                ],
                'billing_details' => [
                    'address' => [
                        'city' => $user_address->city,
                        'country' => $user_address->country,
                        'line1' => $user_address->line1,
                        'line2' => $user_address->line2,
                        'postal_code' => $user_address->postal_code,
                        'state' => $user_address->state,
                    ],
                    "email" => $user->email,
                    "name" => $user->name,
                    "phone" => $user->phone,
                ],
            ]));

            $stripe_payment_intent = \Stripe\PaymentIntent::create([
                'payment_method_types' => ['card'],
                'payment_method' => $method->id,
                'amount' => $price,
                // 'currency' => $request->currency,
                'currency' => 'usd',
                'description' => $description,
            ]);

        } catch (\Throwable$ex) {
            return response()->json([
                $ex->getMessage(),
            ]);
        }

        $stripe_payment_intent->client_secret;

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'stripe_id' => $stripe_payment_intent->id,
            'stripe_status' => $stripe_payment_intent->status,
            'stripe_price' => $price,
            'quantity' => 1,
            'trial_ends_at' => $trial_ends_at,
            'ends_at' => $ends_at,
        ]);

        CustomerNotification::create([
            'user' => $user->email,
            'message' => __('subscribed'),
        ]);

        return response()->json([
            'method' => $method,
            'STRIPE' => $stripe_payment_intent,
            'SUBSCRIBTION' => new SubscriptionResource($subscription),
            'user_address' => Address::where('customer_id', '=', $user->id)->first(),
        ]);

    }
}

// -----------------------------------------------------------
// TEST
// -----------------------------------------------------------

// $customer = \Stripe\Customer::create(array(
//     'address' => [
//         'line1' => '510 Townsend St',
//         'postal_code' => '98140',
//         'city' => 'San Francisco',
//         'state' => 'CA',
//         'country' => 'US',
//     ],
//     "email" => 'jay@gmail.com',
//     "name" => 'jay',
//     "phone" => '+201285821487',
//     "source" => $request->stripeToken,
// ));

// $payment_customer = \Stripe\Customer::create([
//     'name' => $user->name,
// ]);

// 'number' => '4000002760003184',
