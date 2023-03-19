<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerNutrition extends Model
{
    use HasFactory;
    protected $fillable = [
        'nutrition_id',
        'customer_id',
    ];

    /**
     * Get the nutrition that owns the CustomerNutrition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nutrition(): BelongsTo
    {
        return $this->belongsTo(Nutrition::class, 'nutrition_id');
    }



    /**
     * Get the customer that owns the CustomerNutrition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
