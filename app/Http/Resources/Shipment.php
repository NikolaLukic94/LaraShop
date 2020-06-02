<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shipment extends JsonResource
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
            'trackingNumber' => $this->tracking_number,
            'date' => $this->date,
            'otherShipmentDetails' => $this->other_shipment_details,
            'createdAt' => $this->created_at->diffForHumans()
        ];
    }
}
