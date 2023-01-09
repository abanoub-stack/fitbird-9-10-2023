<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseStep extends Model
{
    use HasFactory;
    protected $fillable = [
        // exercise_id    step
        'exercise_id',
        'step',
    ];

    public function Exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

}
