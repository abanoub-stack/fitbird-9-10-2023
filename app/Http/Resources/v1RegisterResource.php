<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class v1RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => "$this->id",
            'name' => "$this->name",
            'phone' => "$this->phone",
            'gender' => "$this->gender",
            'workout_intensity' => "$this->workout_intensity",
            'age' => "$this->age",
            'height' => "$this->height",
            'exercise_days' => "$this->exercise_days",
            'create_at' => "$this->create_at",
        ];
    }
}
