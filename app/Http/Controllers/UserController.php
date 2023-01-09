<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\HistoryPayment;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::orderBy('id', 'desc')->paginate(10);
        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function user($uId)
    {
        $user = Customer::findOrFail($uId);
        return view('user.user', [
            'user' => $user,
        ]);
    }

    public function premiumUsers()
    {
        $premiumUsers = Customer::where('is_subscribed', '=', '1')->paginate(10);

        // dd(strtotime(date(now())));

        return view('user.premium', [
            'users' => $premiumUsers,
        ]);
    }

    public function editPremiumUser($userId)
    {
        $user = Customer::findOrFail($userId);
        return view('user.edit-premium', [
            'user' => $user,
        ]);
    }

    public function editPremiumUserPost(Request $request, $userId)
    {
        $request->validate([
            'subscription_type' => 'required|in:month,three_months,six_months,year',
            'subscription_started_at' => 'required|date',
            'subscription_finished_at' => 'required|date',
        ]);

        $user = Customer::findOrFail($userId);
        if ($request->has('disable')) {
            $user->update([
                'is_subscribed' => '0',
            ]);
            return redirect(url('/users/premium'));
        }
        $user->update([
            'subscription_type' => $request->subscription_type,
            'subscription_started_at' => $request->subscription_started_at,
            'subscription_finished_at' => $request->subscription_finished_at,
        ]);
        return redirect(url('/users/premium'));
    }

    public function assignSubscription()
    {
        return view('user.assign');
    }

    public function assignSubscriptionPost(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|numeric|exists:customers,id',
            'subscription_type' => 'required|in:month,three_months,six_months,year',
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $startedAt = date("Y-m-d h:i:s", time());
        if ($request->subscription_type == 'month') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 month"));
        } elseif ($request->subscription_type == 'three_months') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+3 month"));
        } elseif ($request->subscription_type == 'six_months') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+6 month"));
        } elseif ($request->subscription_type == 'year') {
            $finishedAt = date("Y-m-d h:i:s", +strtotime("+1 year"));
        }

        // $hourDiff = (strtotime($startedAt));
        // dd($hourDiff);

        HistoryPayment::create([
            'user_id' => $customer->id,
            'date_time' => "From $startedAt To $finishedAt",
            'amount' => null,
        ]);

        $customer->update([
            'is_subscribed' => '1',
            'subscription_type' => $request->subscription_type,
            'subscription_started_at' => $startedAt,
            'subscription_finished_at' => $finishedAt,
        ]);
        return redirect(url('/users/premium'));
    }

}
