<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'order_id', 'invoice_id', 'tracking_number', 'date', 'other_shipment_details'
    ];

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
