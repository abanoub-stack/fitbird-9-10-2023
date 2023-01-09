<?php

namespace App\Http\Controllers;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscription.create');
    }
}
