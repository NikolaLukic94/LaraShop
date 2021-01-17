<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        return OrderResource::collection($orders);
    }
}
