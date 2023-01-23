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

        //0 -> text field
        //1 -> text area
        //2 -> single choice
        //3 -> multiple choice
        if ($this->type == 'single' || $this->type == 'multiple') {

                                if ($this->type == 'single') {
                                    return
                                    [
                                        'id' => $this->id,
                                        'title' => $this->title,
                                        'type' => 2,
                                        'body' => json_decode($this->body),
                                        'choice_number' => $this->choice_number,
                                        'created_at' => $this->created_at->diffForHumans(),
                                        'updated_at' => $this->updated_at->diffForHumans(),
                                    ];
                                }
                                else if ($this->type == 'multiple') {
                                    return
                                    [
                                        'id' => $this->id,
                                        'title' => $this->title,
                                        'type' => 3,
                                        'body' => json_decode($this->body),
                                        'choice_number' => $this->choice_number,
                                        'created_at' => $this->created_at->diffForHumans(),
                                        'updated_at' => $this->updated_at->diffForHumans(),
                                    ];
                                }
        }
        else
        {

                if ($this->type == 'field') {
                    return
                    [
                        'id' => $this->id,
                        'title' => $this->title,
                        'type' => 0,
                        'body' => "NA" ,
                        'choice_number' => "NA",
                        'created_at' => $this->created_at->diffForHumans(),
                        'updated_at' => $this->updated_at->diffForHumans(),
                    ];
                }
                else if ($this->type == 'area') {
                    return
                    [
                        'id' => $this->id,
                        'title' => $this->title,
                        'type' => 1,
                        'body' => "NA",
                        'choice_number' => "NA",
                        'created_at' => $this->created_at->diffForHumans(),
                        'updated_at' => $this->updated_at->diffForHumans(),
                    ];
                }
        }

    }
}
