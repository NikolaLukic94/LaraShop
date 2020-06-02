<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'datePlaced' => $this->date_placed,
            'orderDetails' => $this->order_details,
            'createdAt' => $this->created_at->diffForHumans()
        ];
    }
}
