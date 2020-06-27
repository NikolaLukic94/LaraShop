<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderStatusCode()
    {
        return $this->belongsTo(OrderStatusCode::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    
}
