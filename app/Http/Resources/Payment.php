<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Payment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'paymentDate' => $this->payment_date,
            'paymentAmount' => $this->payment_amount,
            'createdAt' => $this->created_at->diffForHumans()
        ];
    }
}
