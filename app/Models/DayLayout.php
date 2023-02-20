<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayLayout extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'data'];
}
