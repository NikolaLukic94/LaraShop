<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRelationshipsResource extends JsonResource
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
            'productType' => [
                'data' => new ProductType($this->productType),
            ],
            'images' => [
                'data' => ProductImage::collection($this->productImages)
            ]
        ];
    }
}
