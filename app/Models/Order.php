<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date_placed', 'order_details', 'user_id', 'order_status_codes_id'
    ];

    public function statusCode()
    {
        return $this->belongsTo(Status::class)->where('type', 'Order');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
