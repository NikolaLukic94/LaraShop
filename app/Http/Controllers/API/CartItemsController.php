<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CartItem as CartItemResource;

class CartItemsController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', 1)->with('cartItems')->first();
        
        $cartItems = $cart ? $cart->cartItems : [];

        // $cartItem = CartItem::paginate(15);
        return CartItemResource::collection($cartItems);
    }
}
