<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function invoice()
	{
	    return $this->belongsTo(Invoice::class);
	}
}
