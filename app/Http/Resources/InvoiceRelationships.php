<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceRelationships extends JsonResource
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
            'invoiceStatusCode' => [
                'data' => new InvoiceStatusCode($this->invoiceStatusCode),
            ],
            'payments' => [
                'data' => Payment::collection($this->payments)
            ],
            'shipments' => [
                'data' => Shipment::collection($this->shipments)
            ],
            'order' => [
                'data' => new Order($this->order)
            ]
        ];
    }
}
