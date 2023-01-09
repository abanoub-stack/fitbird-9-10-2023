<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'customer' => Customer::where('id', '=', $this->customer_id)->first(['id', 'name', 'email', 'phone', 'gender', 'age', 'height']),
            'city' => $this->city,
            'country' => $this->country,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'postal_code' => $this->postal_code,
            'state' => $this->state,
        ];
    }
}
