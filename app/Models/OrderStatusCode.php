<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusCode extends Model
{
    protected $fillable = ['name'];

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
