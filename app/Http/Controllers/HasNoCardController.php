<?php

namespace App\Http\Controllers;

use App\Http\Resources\CreditCardResource;
use App\Models\Credit_card;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HasNoCardController extends Controller
{
    public function addCard(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $userCreditCard = Credit_card::where('customer_id', '=', $user->id)->first();
        if (!$userCreditCard->card_no) {
            // Validation
            $validator = Validator::make($request->all(), [
                // customer_id
                'card_no' => 'required|string|unique:credit_cards,card_no',
                'exp_month' => 'required|string',
                'exp_year' => 'required|string',
                'cvc' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'required' => $validator->errors(),
                ]);
            }
            // Update user's card
            $credit = $userCreditCard->update([
                'card_no' => $request->card_no,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvc' => $request->cvc,
            ]);
            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('added their credit card'),
            ]);
            return response()->json([
                'message' => "user $user->name updated their credit card",
                'card' => new CreditCardResource($userCreditCard),
            ]);
        } else {
            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('tried to update their credit card'),
            ]);
            return response()->json([
                'error' => __('user already has a credit card'),
                'remove_user_credit_card' => url('api/remove-credit'),
                'next_request' => url('api/subscribe'),
            ]);
        }
    }
}
