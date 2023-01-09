<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'level',
        'icon',
    ];

    public function Exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function Sets()
    {
        return $this->hasMany(ExerciseSet::class);
    }

    public function Packages()
    {
        return $this->hasMany(Package::class);
    }

}
