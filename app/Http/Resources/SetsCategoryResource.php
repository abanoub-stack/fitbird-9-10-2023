<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use Illuminate\Http\Resources\Json\JsonResource;

class SetsCategoryResource extends JsonResource
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
            'name' => $this->name,
            'image' => 'uploads/'.$this->icon,
            'total_exercise' => (string) Exercise::where('category_id', '=', $this->id)->count(),
            'time' => Exercise::where('category_id', '=', $this->id)->sum('timee'),
            'calories' => Exercise::where('category_id', '=', $this->id)->sum('calories'),
            //'calories' => "11",
          'level' => "$this->level",
            'description' => $this->description,
        ];
    }
}
