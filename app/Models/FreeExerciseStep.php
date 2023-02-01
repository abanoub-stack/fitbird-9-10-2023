<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeExerciseStep extends Model
{
    use HasFactory;
    protected $fillable = [
        // exercise_id    step
        'free_exercise_id',
        'step',
    ];

    public function Exercise()
    {
        return $this->belongsTo(FreeExercise::class , 'free_exercise_id');
    }
}
