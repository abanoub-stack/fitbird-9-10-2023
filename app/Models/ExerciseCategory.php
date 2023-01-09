<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        // cat_icon    cat_name    level    description    is_deleted
        'cat_icon',
        'cat_name',
        'level',
        'description',
        'is_deleted',
    ];
}
