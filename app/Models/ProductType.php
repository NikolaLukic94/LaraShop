<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
	protected $table = 'product_types';

	protected $guarded = [];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
