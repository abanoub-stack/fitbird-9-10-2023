<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomWorkout extends Model
{
    use HasFactory;
    protected $fillable = [
        // categoty_id    category_name    name    url    image    time    calories    cycle    intervaltime    totalexercise    gif
        'category_id',
        'category_name',
        'name',
        'url',
        'image',
        'time',
        'calories',
        'cycle',
        'intervaltime',
        'totalexercise',
        'gif',
    ];
}
