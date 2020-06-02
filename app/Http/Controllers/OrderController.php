<?php

namespace App\Http\Controllers;

use App\Http\Request\StoreOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrder $request) 
    {
        Order::create([
            'date_placed' => $request->datePlaced,
            'order_details' => $request->orderDetails,
            'user_id' => $request->userId,
            'order_status_codes_id' => $request->orderStatusCodeId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'New order has been placed!'
        ]);
    }

    public function delete($id) 
    {
        $order = Order::find($id);

        $order->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order has been deleted'
        ]);
    }
}
