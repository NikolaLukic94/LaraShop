<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemStatusCode extends Model
{
    protected $fillable = ['name'];

    public function orders()
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
