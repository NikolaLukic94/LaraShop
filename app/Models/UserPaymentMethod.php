<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
