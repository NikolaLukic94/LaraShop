<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemRelationships extends JsonResource
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
            'user' => [
                'data' => new UserResource($this->cart->user),
            ],
            'product' => [
                'data' => new Product($this->product)
            ]
        ];
    }
}
