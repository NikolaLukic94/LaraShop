<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Role extends JsonResource
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
            'id' => (string)$this->id,
            'name'  => (string)$this->name,
            'guard' => (string)$this->guard_name,
            'createdAt' => $this->created_at->diffForHumans()
        ];
    }
}
