<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'workout_intensity' => $this->workout_intensity,
            'age' => $this->age,
            'height' => $this->height,

            'weight' => $this->weight,
            'goals' => $this->goals,
            'activity' => $this->activity,

            'exercise_days' => $this->exercise_days,
            // 'stripe_id' => $this->stripe_id,
            'is_subscribed' => $this->is_subscribed,
            'subscription_type' => $this->subscription_type,
            'subscription_started_at' => $this->subscription_started_at,
            'subscription_finished_at' => $this->subscription_finished_at,
        ];
    }
}
