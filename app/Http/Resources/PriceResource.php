<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
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
            [
                'type' => 'month',
                'price' => $this->price,
            ],
            [
                'type' => 'Three Months',
                'price' => $this->price_three_months,
            ],
            [
                'type' => 'Six Months',
                'price' => $this->price_six_months,
            ],
            [
                'type' => 'Year',
                'price' => $this->price_year,
            ],
        ];
    }
}
