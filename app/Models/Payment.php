<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'invoice_id', 'payment_method_id', 'payment_date', 'payment_amount'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function invoice()
	{
	    return $this->belongsTo(Invoice::class);
	}
}
