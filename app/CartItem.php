<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
