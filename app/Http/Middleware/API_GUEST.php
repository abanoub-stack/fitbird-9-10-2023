<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class API_GUEST
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
                return response()->json([
                    'message' => __('you already logged in'),
                    'access_token' => $user->access_token,
                    'next_request' => url('api/'),
                    'method' => 'GET',
                ]);
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
