<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'cat_icon' => 'uploads/' . $this->icon,
            'cat_name' => $this->name,
            'level' => $this->level,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_deleted' => $this->is_deleted ?? "0",
            'deleted_at' => $this->deleted_at,
            'datetime' => $this->created_at,
            'add' => date('Y-m-d'),
        ];
    }
}
