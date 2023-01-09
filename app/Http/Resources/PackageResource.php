<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id' => $this->id,
            // 'name' => $this->name,
            //'customer' => Customer::where('id', '=', $this->customer_id)->get(['id', 'name', 'phone', 'gender', 'workout_intensity', 'age', 'height', 'exercise_days']),
            // 'category' => Category::where('id', '=', $this->category_id)->get(['id', 'name', 'description', 'level']),
            //'category_icon' => 'uploads/' . Category::where('id', '=', $this->category_id)->first()->icon ?? null,
            'exercise' => Exercise::where('id', '=', $this->exercise_id)->get(['id', 'name', 'repeat_count', 'url', 'timee', 'calories']),
            // 'exercise_image' => 'uploads/' . Exercise::where('id', '=', $this->exercise_id)->first()->image ?? null,
        ];
    }
}
