<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderStatusCode()
    {
        return $this->belongsTo('App\OrderStatusCode');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
}
