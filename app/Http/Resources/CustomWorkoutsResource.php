<?php

namespace App\Http\Resources;

use App\Models\FreeExercise;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomWorkoutsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $exe_array = json_decode($this->exercises , true);
        $exercises = FreeExercise::whereIn('id',$exe_array)->get();
        return [
            'name' => $this->name,
            'interval_time' => $this->interval_time,
            'repeat_count' => $this->repeat_count,
            'exe_count' => $exercises->count() ,
            'time' => $exercises->sum('timee'),
            'exersices' => $exercises,
            ];
        }
}
