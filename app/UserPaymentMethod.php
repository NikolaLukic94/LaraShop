<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }
}
