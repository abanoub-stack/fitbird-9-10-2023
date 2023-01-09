<?php

namespace App\Http\Controllers;

use App\Models\SendNotification;

class NotifictaionController extends Controller
{
    public function index()
    {
        $notifications = SendNotification::orderBy('id', 'desc')->paginate(10);
        return view('sendnotification.index', [
            'notifications' => $notifications,
        ]);
    }

    public function send()
    {
        //
    }

}
