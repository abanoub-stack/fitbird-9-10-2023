<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IosNotifiactionController extends Controller
{
    public function index()
    {
        if (Notification::all()->count() == 0) {
            Auth::logout();
        }
        $key = Notification::all()->first();
        return view('ios.notification', [
            'key' => $key,
        ]);
    }

    public function updateIos(Request $request)
    {
        $n = Notification::all()->first();
        $isCorrect = Notification::findOrFail($n->id);
        if ($isCorrect) {
            $request->validate([
                'ios_key' => 'required|string|unique:notifications,ios_key',
            ]);
            $isCorrect->update([
                'ios_key' => $request->ios_key,
            ]);
            return back();
        } else {
            Auth::logout();
        }
    }
}
