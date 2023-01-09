<?php

namespace App\Http\Middleware;

use App\Models\Credit_card;
use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;

class HasNoCredit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $userCreditCard = Credit_card::where('customer_id', '=', $user->id)->first();
        if ($userCreditCard) {
            return response()->json([
                'message' => __('you already has a credit card'),
            ]);
        } else {
            return $next($request);
        }
    }
}
