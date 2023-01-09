<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AndroidMetadata extends Model
{
    use HasFactory;
    protected $fillable = ['locale'];
}
