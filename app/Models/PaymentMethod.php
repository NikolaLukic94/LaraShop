<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];

    public function usersPaymentMethod()
    {
        return $this->belongsToMany(UserPaymentMethod::class);
    }
}
