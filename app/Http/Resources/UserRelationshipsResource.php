<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRelationshipsResource extends JsonResource
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
            'addresses'   => UserAddresses::collection($this->addresses),
            'userPaymentMethods' => UsersPaymentMethod::collection($this->paymentMethods)
        ];
    }
}
