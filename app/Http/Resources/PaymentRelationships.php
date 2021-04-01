<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentRelationships extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'paymentMethod' => [
                'data' => new PaymentMethod($this->paymentMethod),
            ],
            'invoice' => [
                'data' => new Invoice($this->invoice)
            ]
        ];
    }
}
