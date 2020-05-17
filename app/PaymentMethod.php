<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function usersPaymentMethod()
    {
        return $this->belongsToMany('App\UserPaymentMethod');
    }
}
