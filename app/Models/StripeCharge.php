<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCharge extends Model
{
    use HasFactory;
    protected $fillable = [
        // customer_id    amount    currency    stripe_customer_id    description
        'customer_id',
        'amount',
        'currency',
        'stripe_customer_id',
        'description',
    ];
}
