<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];

	protected $table = 'products';

    public function productType()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

}
