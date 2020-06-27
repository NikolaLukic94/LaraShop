<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
