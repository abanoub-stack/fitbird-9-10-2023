<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokanData extends Model
{
    use HasFactory;
    protected $fillable = [
        // token    type    user_id    delivery_boyid
        'token',
        'type',
        'user_id',
        'delivery_boyid',
    ];
}
