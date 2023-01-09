<?php

namespace App\Http\Middleware;

use App\Models\Credit_card;
use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;

class HasCredit
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
        $credit_card = Credit_card::where('customer_id', '=', $user->id)->first();
        if ($credit_card) {
            if ($credit_card->card_no !== null and $credit_card->exp_month !== null and $credit_card->exp_year !== null and $credit_card->cvc !== null) {
                return $next($request);
            } else {
                return response()->json([
                    'error' => __('must add a credit card'),
                    'next_request' => url('api/add-credit'),
                    'method' => 'POST',
                ]);
            }
        } else {
            return response()->json([
                'error' => __('must add a credit card'),
                'next_request' => url('api/add-credit'),
                'method' => 'POST',
            ]);
        }

    }
}
