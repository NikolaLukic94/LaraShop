<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoiceStatusCode()
    {
        return $this->belongsTo(InvoiceStatusCode::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
