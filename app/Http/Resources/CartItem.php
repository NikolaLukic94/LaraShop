<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItem extends JsonResource
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
            'quantity' => $this->quantity,
            'createdAt' => $this->created_at->diffForHumans(),
            'relationships' => new CartItemRelationships($this),
            // 'cart' => $this->cart,
            // 'owner' => $this->cart->user,
            // 'product' => $this->product
        ];
    }
}
