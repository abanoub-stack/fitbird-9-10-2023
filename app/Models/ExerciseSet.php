<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSet extends Model
{
    use HasFactory;
    protected $fillable = [
        // cat_id    exercise_id    is_deleted
        'category_id',
        'exercise_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

}
