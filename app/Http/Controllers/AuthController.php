<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (User::all()->count() == 0) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'currency' => 'EG',
                'password' => '$2y$10$vc.bjN0M6gzQI5yQ.BIqlOMhIyv5WKqL8Kryjg4Eg8ASwh53pcQlm',
                'role' => 'SUPER_ADMIN',
            ]);
        }
        if (Notification::all()->count() == 0) {
            Notification::create([
                'android_key' => '',
                'ios_key' => '',
            ]);
        }
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string',
        ]);
        $isCorrect = Auth::attempt(['email' => $request->email, 'password' => $request->password] , $request->remember);
        if (!$isCorrect) {
            return back();
        } else {
            AdminNotification::create([
                'admin' => auth()->user()->name,
                'message' => __('Logged In Successfully'),
            ]);
            return redirect(url('/'));
        }
    }

    public function logout()
    {
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __('Logged Out Successfully'),
        ]);
        Auth::logout();
        return redirect(url('/'));
    }

}
