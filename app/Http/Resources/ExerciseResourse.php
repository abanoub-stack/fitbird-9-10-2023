<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResourse extends JsonResource
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
            'image' => 'uploads/' . $this->image,
            'repeat_count' => $this->repeat_count,
            'url' => $this->url,
            'cat_name' => $this->cat_name,
            'timee' => $this->timee,
            'calories' => $this->calories,
            'gif' => $this->gif,
            'created_at' => $this->created_at,
            'updated_at' => $this->created_at,
            'is_deleted' => (string) $this->is_deleted ?? '0',
            'deleted_at' => $this->deleted_at,
            'datetime' => $this->created_at,
        ];
    }
}
