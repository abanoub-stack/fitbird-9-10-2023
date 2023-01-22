<?php

namespace App\Http\Controllers;

use App\Models\CustomerNotification;

class AppNotificationController extends Controller
{
    public function allNotifications()
    {
        $notifications = CustomerNotification::orderBy('id', 'desc')->paginate(10);
        return view('appNotification.notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function markAsRead($nId)
    {
        $notification = CustomerNotification::findOrFail($nId);
        $notification->update([
            'readed' => '1',
        ]);
        return back();
    }

    public function deleteNotification($nId)
    {
        $notification = CustomerNotification::findOrFail($nId);
        $notification->delete();
        return back();
    }

    public function deleteAllNotification()
    {
        $notifications = CustomerNotification::all();
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        return back();
    }

}
