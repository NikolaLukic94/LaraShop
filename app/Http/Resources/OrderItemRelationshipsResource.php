<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemRelationshipsResource extends JsonResource
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
            'product' => [
                'data' => new Product($this->product),
            ],
            'order' => [
                'data' => new Order($this->order)
            ],
//            'shipmentItem' => [
//                'data' => new ShipmentItem($this->shipmentItems)
//            ],
            'owner' => [
                'data' => new UserResource($this->owner)
            ]
        ];
    }
}
