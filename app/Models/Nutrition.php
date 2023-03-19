<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nutrition extends Model
{
    use HasFactory;
    protected $fillable = ['title','data'];

    /**
     * The customers that belong to the Nutrition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'customer_nutrition', 'nutrition_id', 'customer_id');
    }
}
