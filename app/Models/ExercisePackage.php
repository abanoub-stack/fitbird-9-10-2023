<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExercisePackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'exercise_id',
        'package_id',
    ];
}
