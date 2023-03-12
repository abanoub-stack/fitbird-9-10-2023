<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomWorkouts extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'interval_time' , 'repeat_count' , 'user_id' , 'exercises'];
    protected $table = 'custom_workouts';

    /**
     * Get the user that owns the CustomWorkouts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
