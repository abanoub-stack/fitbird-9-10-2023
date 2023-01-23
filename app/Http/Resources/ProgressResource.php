<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'id' => $this->id,
            'workouts' => $this->workouts,
            'calories' => $this->calories,
            'seconds' => $this->seconds,
            'progress_date' => $this->progress_date->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d:h:m:s')
        ];
    }
}
