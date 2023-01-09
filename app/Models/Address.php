<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        // customer_id    city    country    line1    line2    postal_code    state
        'customer_id',
        'city',
        'country',
        'line1',
        'line2',
        'postal_code',
        'state',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
