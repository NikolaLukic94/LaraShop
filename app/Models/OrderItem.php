<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }

}
