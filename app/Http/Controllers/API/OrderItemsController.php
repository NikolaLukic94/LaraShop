<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItem;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemsController extends Controller {

    public function index()
    {
        $authUserCartItems = OrderItem::where('user_id', Auth::id())->get();

        return \App\Http\Resources\OrderItem::collection($authUserCartItems);
    }

    public function store(StoreOrderItem $request)
    {
        $orderItem = OrderItem::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($orderItem === null) {
            $orderItem = OrderItem::create([
                'product_id' => $request->productId,
                'user_id' => Auth::id(),
                'quantity' => 1,
                'price' => Product::find($request->productId)->price * $request->quantity
            ]);

            $message = 'New item added to cart!';
        } else {
            $orderItem->quantity = $orderItem->quantity + 1;
            $orderItem->price = Product::find($request->productId)->price + $orderItem->price;
            $orderItem->save();

            $message = 'Quantity increased!';
        }

        return response()->json([
            'cartItem' => $orderItem,
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function update(Request $request, $id)
    {
        // TODO: validation
        $orderItem = OrderItem::find($id);

        $message = $request->quantity > $orderItem->quanitity ? 'Quantity increased!' : 'Quantity decreased!';

        $orderItem->quantity = $request->quantity;
        $orderItem->price = $orderItem->quantity * $orderItem->product->price;

        $orderItem->save();

        if ($orderItem->quantity === 0) {
            $orderItem->delete();
            $message = 'Item removed from cart!';
        }

        return response()->json([
            'quantity' => $orderItem->quantity,
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed!'
        ]);
    }

}
