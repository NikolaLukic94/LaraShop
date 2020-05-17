<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function shipmentItems()
    {
        return $this->hasMany('App\ShipmentItem');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
}
