<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AndroidNotifiactionController extends Controller
{
    public function index()
    {
        if (Notification::all()->count() == 0) {
            Auth::logout();
        }
        $key = Notification::all()->first();
        return view('android.notification', [
            'key' => $key,
        ]);
    }

    public function updateAndroid(Request $request)
    {
        $n = Notification::all()->first();
        $isCorrect = Notification::findOrFail($n->id);
        if ($isCorrect) {
            $request->validate([
                'android_key' => 'required|string|unique:notifications,android_key',
            ]);
            $isCorrect->update([
                'android_key' => $request->android_key,
            ]);
            return back();
        } else {
            Auth::logout();
        }
    }
}
