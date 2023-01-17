<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->type == 'single' || $this->type == 'multiple') {
            return
            [
                'id' => $this->id,
                'title' => $this->title,
                'type' => $this->type,
                'body' => json_decode($this->body),
                'choice_number' => $this->choice_number,
                'created_at' => $this->created_at->diffForHumans(),
                'updated_at' => $this->updated_at->diffForHumans(),
            ];
        }
        else
        {
            return
            [
                'id' => $this->id,
                'title' => $this->title,
                'type' => $this->type,
                'body' => "NA",
                'choice_number' => "NA",
                'created_at' => $this->created_at->diffForHumans(),
                'updated_at' => $this->updated_at->diffForHumans(),
            ];
        }

    }
}
