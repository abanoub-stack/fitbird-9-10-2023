<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteWorkout extends Model
{
    use HasFactory;
    protected $fillable = [
        // workout_name    current_time    total_time    calories    todays_date    day    month    total_exercise
        'workout_name',
        'current_time',
        'total_time',
        'calories',
        'todays_date',
        'day',
        'month',
        'total_exercise',
    ];
}
