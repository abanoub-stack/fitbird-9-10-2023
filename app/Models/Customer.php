<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'gender',
        'email',
        'is_subscribed',
        'subscription_type',
        'subscription_started_at',
        'subscription_finished_at',
        'workout_intensity',
        'age',
        'height',
        'exercise_days',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
        'access_token',
        'password',
    ];

    public function Packages()
    {
        return $this->belongsTo(Package::class);
    }

    public function StripeCustomer()
    {
        return $this->belongsTo(StripeCustomer::class);
    }

    public function Address()
    {
        return $this->belongsTo(Address::class);
    }

    public function CreditCard()
    {
        return $this->belongsTo(Creditcard::class);
    }

}