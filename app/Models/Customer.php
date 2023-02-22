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
        'image',
        'goals',
        'weight',
        'activity',
        'provider_id',
        'provider_name',
        'avatar',
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

    /**
     * Get all of the answers for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class , 'user_id');
    }


    /**
     * Get all of the progresses for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function progresses()
    {
        return $this->hasMany(Progress::class , 'customer_id');
    }

    public function subscribeWeeks()
    {
        return $this->hasOne(SubscribeWeeks::class , 'customer_id');
    }

    public function getSubType()
    {
        $type = $this->subscription_type;
        if($type == 'month')
        return 'Month';

        if($type == 'three_months')
        return '3 Months';

        if($type == 'six_months')
        return '6 Months';

        if($type == 'year')
        return '12 Month';
    }

    public function is_subscribed()
    {
        if($this->is_subscribed == 0)
            return false;
        else
            return true ;
    }

    public function get_sub_weeks()
    {
        if($this->is_subscribed == 1)
        {
            $data = json_decode($this->subscribeWeeks->data , true);

            return count($data);

        }
        else
        {
            return 0;
        }

    }


    public function getSubInDays()
    {
        $type = $this->subscription_type;
        if($type == 'month')
        return 30;

        if($type == 'three_months')
        return 90;

        if($type == 'six_months')
        return 180;

        if($type == 'year')
        return 360;
    }

}
