<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['order_id', 'invoice_status_code_id', 'date', 'invoice_details', 'status_id'];
    // todo: rename
    public function invoiceStatusCode()
    {
        return $this->belongsTo(Status::class)->where('type', 'Invoice');
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
