<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditCardResource extends JsonResource
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
            // $this->customer_id
            'customer' => Customer::where('id', '=', $this->customer_id)->first(['name', 'email', 'phone', 'gender', 'age', 'height']),
            'card_no' => "$this->card_no",
            'exp_month' => "$this->exp_month",
            'exp_year' => "$this->exp_year",
            'cvc' => "$this->cvc",
        ];
    }
}
