<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'genre' => $this->genre,
            'author' => $this->author,
            'desription' => $this->desription,
            'price' => $this->price, //number_format($this->price, 2, ',', ''),
            'color' => $this->color,
            'quantity' => $this->quantity,
            'size' => $this->size,
            'otherProductDetails' => $this->other_product_details,
            'relationships' => new ProductRelationshipsResource($this),
            'createdAt' => $this->created_at->diffForHumans(),
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://github.com/NikolaLukic94')
        ];
    }
}
