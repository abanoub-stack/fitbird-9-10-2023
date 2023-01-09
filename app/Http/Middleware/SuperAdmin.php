<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdmin
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
        #------------------------------------------------------------------------
        #Delete All ended subscribtion users#
        DB::table('subscriptions')->where('ends_at', '<=', date("Y-m-d"))->delete();
        $del = [];
        foreach (DB::table('subscriptions')->get() as $sub) {
            if (strtotime('today') >= strtotime($sub->ends_at)) {
                $del[] = $sub;
            }
        }
        foreach ($del as $d) {
            $d->delete();
        }
        #------------------------------------------------------------------------
        $admin = Auth::user();
        if ($admin) {
            if ($admin->role == 'SUPER_ADMIN') {
                return $next($request);
            } else {
                return redirect(url('/'));
            }
        } else {
            return redirect(url('/'));
        }
    }
}
