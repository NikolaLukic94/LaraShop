<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderItem;
use App\Http\Requests\StoreOrderItem;
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

    public function update(UpdateOrderItem $request, $id) 
    {
        $orderItem = OrderItem::find($id);

        $orderItem->user_id = $request->userId;
        $orderItem->order_item_status_code_id = $request->orderItemStatusCodeId;
        $orderItem->product_id = $request->productId;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $request->price;

        $orderItem->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Order item has been updated!',
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
