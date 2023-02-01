<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeExercise extends Model
{
    use HasFactory;
    protected $fillable = [
        // name    image    repeat_count    url    cat_name    time    calories    gif    is_deleted    deleted_at
        'name',
        'image',
        'repeat_count',
        'url',
        'cat_name',
        'timee',
        'calories',
        // 'gif',
        'image',
        'is_deleted',
        'deleted_at',
        'category_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ExerciseSteps()
    {
        return $this->hasMany(FreeExerciseStep::class , 'free_exercise_id');
    }

    public function Sets()
    {
        return $this->hasMany(ExerciseSet::class , 'free_exercise_id');
    }

    public function Packages()
    {
        return $this->hasMany(Package::class , 'exercise_id');
    }

}

