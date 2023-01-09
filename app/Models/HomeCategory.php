<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        // description    tot_exercise    time    calories    type    image    name
        'description',
        'tot_exercise',
        'calories',
        'type',
        'image',
        'name',
        'time',
    ];
}
