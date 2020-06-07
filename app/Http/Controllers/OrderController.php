<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
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

    public function update(UpdateOrder $request, $id) 
    {
        $order = Order::find($id);

        $order->date_placed = $request->datePlaced;
        $order->order_details = $request->orderDetails;
        $order->user_id = $request->userId;
        $order->order_status_codes_id = $request->orderStatusCodeId;

        $order->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been updated!'
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
