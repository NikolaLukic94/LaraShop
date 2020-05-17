<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItemStatusCode extends Model
{
    public function orders()
    {
        return $this->belongsToMany('App\OrderItem');
    }
}
