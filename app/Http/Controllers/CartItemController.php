<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->productId,
            // 'quantity' => $request->quantity
            'quantity' => 1
        ]);

        return response()->json([
            'cartItem' => $cartItem,
            'status' => 'success',
            'message' => 'New item added to cart!'
        ]);
    }

    public function increaseQuantity($id) 
    {
        $cartItem = CartItem::find($id);

        $cartItem->quantity = $cartItem->quantity + 1;

        $cartItem->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Quantity increased!'
        ]);
    }
    
    public function decreaseQuantity($id)
    {
        $cartItem = CartItem::find($id);

        $cartItem->quantity = $cartItem->quantity - 1;

        $cartItem->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Quantity decreased!'
        ]);
    }

    public function changeQuantity($id, $request)
    {
        $cartItem = CartItem::find($id);

        $cartItem->quantity = $request->newQuantity;

        $cartItem->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Quantity updated!'
        ]);
    }

    public function destroy($id)
    {
        $cartItem = CartItem::find($id);

        $cartItem->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed!'
        ]);
    }
}
