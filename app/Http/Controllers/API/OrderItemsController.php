<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItem;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemsController extends Controller
{
    public function index()
    {
        $authUserCartItems = auth()->user()->cartItems;

        return \App\Http\Resources\OrderItem::collection($authUserCartItems);
    }

    public function store(StoreOrderItem $request)
    {
        $authUser = auth()->user();

        $theCartItem = $authUser->cartItems->where('product_id', $request->productId)->first();

        if ($theCartItem) {
            $theCartItem->update(['quantity' => $theCartItem->quantity + 1]);

            $message = 'Quantity increased!';
        } else {
            $theCartItem = $authUser->cartItems()->create([
                'product_id' => $request->productId,
                'quantity' => 1,
                'price' => Product::find($request->productId)->price * $request->quantity
            ]);

            $message = 'New item added to cart!';
        }

        return response()->json([
            'cartItem' => $theCartItem,
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function update(Request $request, $id)
    {
        // TODO: move to validation class
        $orderItem = OrderItem::find($id);

        if ($request->quantity < 1) {
            return response()->json([
                'orderItem' => $orderItem,
                'status' => 'error',
                'message' => 'Unable to decrease the quantity!'
            ]);
        }

        $message = $request->quantity > $orderItem->quantity ? 'Quantity increased!' : 'Quantity decreased!';

        $orderItem->quantity = $request->quantity;
        $orderItem->price = $orderItem->quantity * $orderItem->product->price;

        $orderItem->save();

        if ($request->quantity === 0) {
            $orderItem->delete();
            $orderItem = null;
            $message = 'Item removed from cart!';
        }

        return response()->json([
            'orderItem' => $orderItem,
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
