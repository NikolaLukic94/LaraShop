<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->id,
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'New item added to cart!'
        ]);
    }
}
