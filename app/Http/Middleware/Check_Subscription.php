<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Check_Subscription
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
        if ($request->header('access_token')) {
            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

            if ($user) {

                if ($user->is_subscribed == '1')
                {
                    $finishDate = Carbon::parse($user->subscription_finished_at);
                    $now = Carbon::now();

                    if ($now->toDateString() >= $finishDate->toDateString())
                    {
                        $user->is_subscribed = '0';
                        $user->save();
                        return response()->json([
                            'error' => "Subscription ended!",
                        ],403);
                    }

                }
                return $next($request);
            } else {
                return response()->json([
                    'error' => "wrong access token",
                ]);
            }
        } else {
            return response()->json([
                'error' => 'must login to continue',
            ] , 401);
        }
    }
}
