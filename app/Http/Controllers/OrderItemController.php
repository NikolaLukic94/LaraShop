<?php

namespace App\Http\Controllers;
use App\Http\Request\StoreOrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(StoreOrderItem $request) 
    {
        OrderItem::create([
            'user_id' => $request->userId,
            'order_item_status_code_id' => $request->orderItemStatusCodeId,
            'product_id' => $request->productId,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Order item has been created',
        ]);
    }

    public function delete($id) 
    {
        $orderItem = OrderItem::find($id);

        $orderItem->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order item has been deleted'
        ]);
    }
}
