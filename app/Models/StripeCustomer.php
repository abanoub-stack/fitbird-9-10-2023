<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'number',
        'exp_month',
        'exp_year',
        'cvc',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
