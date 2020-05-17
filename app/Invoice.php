<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoiceStatusCode()
    {
        return $this->belongsTo('App\InvoiceStatusCode');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function shipments()
    {
        return $this->hasMany('App\Shipment');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
