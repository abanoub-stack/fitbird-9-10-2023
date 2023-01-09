<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerNotification;
use App\Models\Subscription;
use Illuminate\Http\Request;

class CancelRegistrationController extends Controller
{
    public function cancelSubcription(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $userSubscription = Subscription::where('user_id', '=', $user->id)->first();
        if ($userSubscription) {
            $userSubscription->delete();
            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('canceled subscription'),
            ]);
            return response()->json([
                'message' => __('user canceled subscription successfully'),
                'next_request' => url('api/v1'),
                'method' => 'GET',
            ]);
        } else {
            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('tried to cancel subscription'),
            ]);
            return response()->json([
                'error' => __('user not subscribed yet'),
                'next_request' => url('api/v1/subscribe'),
                'method' => 'POST',
            ]);
        }
    }
}
