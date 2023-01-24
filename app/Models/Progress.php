<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable =['calories' , 'workouts' , 'seconds' , 'customer_id' , 'progress_date'];
    protected $dates = ['progress_date'];


    /**
     * Get the user that owns the Progress
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // public function setDateAttribute($value)
    // {
    //     $this->attributes['datetime'] = Carbon::createFromFormat('Y-m-d\TH:i:s', $value);
    // }

    public function getMinutes()
    {
        return $this->seconds/60;
    }

}
