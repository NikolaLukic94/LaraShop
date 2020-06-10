<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItemStatusCode extends Model
{
    protected $fillable = ['name'];

    public function orders()
    {
        return $this->belongsToMany('App\OrderItem');
    }
}
