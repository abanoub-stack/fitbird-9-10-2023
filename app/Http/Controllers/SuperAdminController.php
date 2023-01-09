<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function admins()
    {
        // $admins = User::all();
        $admins = User::where('role', '!=', 'SUPER_ADMIN')->get();
        return view('admin.admins', [
            'admins' => $admins,
        ]);
    }

    public function deleteAdmin($adminId)
    {
        $admin = User::findOrFail($adminId);
        $admin->delete();
        return back();
    }

    public function addAdmin()
    {
        return view('admin.add-admin');
    }

    public function addAdminPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:users,name',
            'email' => 'required|email|max:50|unique:users,email',
            'currency' => 'required|string|max:50',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'currency' => $request->currency,
            'password' => bcrypt($request->password),
            'role' => 'ADMIN',
        ]);
        return redirect(url('admins'));
    }

    public function editAdmin($adminId)
    {
        $admin = User::findOrFail($adminId);
        return view('admin.edit', [
            'admin' => $admin,
        ]);
    }

    public function editAdminPost(Request $request, $adminId)
    {
        $request->validate([
            'admin_name' => 'required|string|max:50',
            'admin_email' => 'required|email|max:50',
            'admin_role' => 'required|in:ADMIN,SUPER_ADMIN',
            'admin_password' => 'nullable|string|min:4|max:64',
        ]);

        $admin = User::findOrFail($adminId);
        if ($request->has('admin_password')) {
            $password = bcrypt($request->admin_password);
        } else {
            $password = $admin->password;
        }

        $admin->update([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => $password,
        ]);

        return redirect(url('/admins'));

    }

    public function allNotification()
    {
        $notifications = AdminNotification::orderBy('id', 'desc')->get();
        return view('admin.notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function deleteNotification($nId)
    {
        $notification = AdminNotification::findOrFail($nId);
        $notification->delete();
        return back();
    }

    public function notificationMarKAsRead($nId)
    {
        $notification = AdminNotification::findOrFail($nId);
        $notification->update([
            'readed' => true,
        ]);
        return back();
    }

    public function deleteAllNotifications()
    {
        $notifications = AdminNotification::all();
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        return back();
    }

}
