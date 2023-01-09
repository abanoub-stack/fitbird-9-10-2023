<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    // name    user_id    category_id    exercise_id
    protected $fillable = [
        'name',
        'customer_id',
        'category_id',
        'exercise_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

}
