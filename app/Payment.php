<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }

    public function invoice()
	{
	    return $this->belongsTo('App\Invoice');
	}
}
