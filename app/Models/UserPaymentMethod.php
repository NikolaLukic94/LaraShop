<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    protected $fillable = [            
        'ccv',
        'year', 
        'cardType', 
        'owner', 
        'credit_card_number', 
        'user_id', 
        'expiration', 
        'payment_method_id'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
