<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date_time',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class , 'user_id');
    }

}
