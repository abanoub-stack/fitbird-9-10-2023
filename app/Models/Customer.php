<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $fillable = [
        'avatar',
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

    public function getImagePath()
    {
        if ($this->avatar != null) {
            return  $this->avatar;
        }
        else
        {
            if ($this->image != null) {
                return  asset($this->image);
            }
            else
            {
                return asset('dashboard/img/undraw_profile.svg');
            }
        }
    }

    public function getWorkoutsDetails()
    {
        $weeks_number = $this->get_sub_weeks();
        $total_workouts = (int)$this->exercise_days * $weeks_number;
        $this_weeks = json_decode($this->subscribeWeeks()->first()->data , true);
        $complete_counter = 0;
        foreach ($this_weeks as $weeks => $week) {
            foreach ($week as $day => $data) {
                //If The Day is Completed then increment the complete counter
                if($data['is_completed']) $complete_counter++  ;
            }
        }

        $percent = ($complete_counter / $total_workouts ) * 100;
        if($percent > 100) $percent = 100;

        return
            [
                'sub_type' => $this->subscription_type,
                'sub_weeks' => $weeks_number,
                'sub_weeks_started_at' => $this->subscription_started_at,
                'sub_weeks_finished_at' => $this->subscription_finished_at,
                'exercise_days' => $this->exercise_days,
                'total_workouts' => $total_workouts,
                'completed_workouts' =>$complete_counter ,
                'percent' => $percent,
            ];
    }


    /**
     * Get all of the customeWorkouts for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customeWorkouts(): HasMany
    {
        return $this->hasMany(CustomWorkouts::class, 'user_id');
    }





    /**
     * Get the nutrition associated with the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nutrition(): HasOne
    {
        return $this->hasOne(CustomerNutrition::class, 'customer_id');
    }

    public function getRemainingDays()
    {
        //Subscription Finished
        if ( Carbon::parse($this->subscription_finished_at) < Carbon::now())
        {
            $customer = Customer::find($this->id);
            $customer->update(
                [
                    'is_subscribed' => "0",
                    'is_subscription_finished' => "1",
                ]
            );
            return "FINISHED";
        }

        $days = $remainingDay = '';

        if($this->is_subscribed == "1")
        {
            //Subscription Not Finished
            if ($this->subscription_finished_at > Carbon::now()) {
                $days = Carbon::parse($this->subscription_finished_at)->diffInDays();
                if($days == 1)
                {
                    $remainingDay = $days.' Day';
                }
                else
                {
                    $remainingDay = $days.' Days';
                }
            }

            if ($days >= 30 && $days <= 365) {
                $remainingDay = '';
                $months = floor($days / 30);
                $extraDays = $days % 30;
                if ($extraDays > 0) {
                    if($months == 1)
                    {
                        $remainingDay .= $months.' Month '.$extraDays.' Days';
                    }
                    else
                    {
                        $remainingDay .= $months.' Months '.$extraDays.' Days';
                    }
                } else {
                    if($months == 1)
                    {
                        $remainingDay .= $months.' Month ';
                    }
                    else
                    {
                        $remainingDay .= $months.' Months ';
                    }
                }
            }

            if ($days >= 365) {
                $remainingDay = '';
                $years = floor($days / 365);
                $extraMonths = floor($days % 365 / 30);
                $extraDays = floor($days % 365 % 30);
                if ($extraMonths > 0 && $extraDays < 1) {
                    $remainingDay .= $years.' Years '.$extraMonths.' Month ';
                } elseif ($extraDays > 0 && $extraMonths < 1) {
                    $remainingDay .= $years.' Years '.$extraDays.' Days';
                } elseif ($years > 0 && $extraDays > 0 && $extraMonths > 0) {
                    $remainingDay .= $years.' Years '.$extraMonths.' Month '.$extraDays.' Days';
                } else {
                    $remainingDay .= $years.' Years ';
                }
            }
        }

        return $remainingDay;
    }
}
