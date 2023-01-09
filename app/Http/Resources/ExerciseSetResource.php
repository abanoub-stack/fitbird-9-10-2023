<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseSetResource extends JsonResource
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
            'category' => Category::find($this->id, ['id', 'name', 'description', 'level']),
            'category_icon' => 'uploads/' . Category::find($this->id)->icon,
            'exercise' => Exercise::find($this->exercise_id, ['id', 'name', 'repeat_count', 'url', 'time', 'calories']),
            'exercise_image' => 'uploads/' . Exercise::find($this->exercise_id)->image,
        ];
    }
}
