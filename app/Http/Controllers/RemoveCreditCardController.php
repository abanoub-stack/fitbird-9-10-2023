<?php

namespace App\Http\Controllers;

use App\Models\Credit_card;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Illuminate\Http\Request;

class RemoveCreditCardController extends Controller
{
    public function removeCreditCard(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $userCreditCard = Credit_card::where('customer_id', '=', $user->id)->first();
        if ($userCreditCard) {
            if ($userCreditCard->card_no !== null) {
                $userCreditCard->update([
                    'card_no' => null,
                    'exp_month' => null,
                    'exp_year' => null,
                    'cvc' => null,
                ]);
                CustomerNotification::create([
                    'user' => $user->email,
                    'message' => __('removed their credit card'),
                ]);
                return response()->json([
                    'message' => __('user removed credit card successfully'),
                    'next_request' => url('api/v1/'),
                    'method' => 'GET',
                ]);

            } else {
                CustomerNotification::create([
                    'user' => $user->email,
                    'message' => __('tried to remove their credit card'),
                ]);
                return response()->json([
                    'error' => __('user already has not a credit card'),
                    'next_request' => url('api/v1/add-credit'),
                    'method' => 'POST',
                ]);
            }
        } else {
            return response()->json([
                'error' => __('please contact app support'),
            ]);
        }
    }
}
