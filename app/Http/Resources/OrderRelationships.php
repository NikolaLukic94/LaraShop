<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRelationships extends JsonResource
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
            'user'   => [
                'data'  => new User($this->user),
            ],
            'orderItems' => [
                'data' => OrderItem::collection($this->orderItems)
            ],
            'invoice' => [
                'data' => new Invoice($this->invoice)
            ]
        ];
    }
}
