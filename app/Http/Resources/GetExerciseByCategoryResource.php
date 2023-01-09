<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GetExerciseByCategoryResource extends JsonResource
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
            'repeat_count' => (string) $this->repeat_count,
            'url' => $this->url,
            'cat_name' => $this->cat_name,
            'timee' => $this->timee,
            'calories' => $this->calories,
            'gif' => $this->gif,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_deleted' => (string) "0",
            'deleted_at' => $this->deleted_at,
            'datetime' => $this->created_at,
            'add' => date('Y-m-d'),
        ];
    }
}
