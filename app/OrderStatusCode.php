<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatusCode extends Model
{
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
}
