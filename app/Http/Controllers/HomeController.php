<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function layout()
    {
        return view('index2');
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('profile.profile', [
            'admin' => $admin,
        ]);
    }

    public function profilePost(Request $request)
    {
        $admin = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'nullable|string|min:4|confirmed',
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __('Updated Profile Information'),
        ]);
        if ($request->has('password')) {
            if ($request->password !== null) {
                $admin->update([
                    'password' => bcrypt($request->password),
                ]);
                AdminNotification::create([
                    'admin' => auth()->user()->name,
                    'message' => __('Updated Profile Information'),
                ]);
                Auth::logout();
                return redirect(url('/'));
            }
            return redirect(url('/'));
        }
        return redirect(url('/'));

    }

    public function checkOut()
    {
        return view('stripe.checkout');
    }

    public function pay(Request $request, $userId)
    {
        $stripeToken = $request->stripeToken;
        $user = Customer::findOrFail($userId);
        $user->update([
            'stripe_id' => $stripeToken,
        ]);
        return redirect(url('users'));
    }

}
