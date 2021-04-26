<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'user_id', 'status_id', 'order_id', 'product_id', 'quantity', 'price'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }
}
