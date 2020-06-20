<?php

namespace App\Http\Controllers;
use App\Http\Resources\CartItem as CartItemResource;
use Illuminate\Http\Request;
use App\CartItem;

class CartController extends Controller
{
    public function checkout()
    {
        return view('cart.checkout');
    }

    public function all()
    {
        $cartItem = CartItem::paginate(15);

        return CartItemResource::collection($cartItem);
    }

    // cart belongs to one user and can have many products
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
    }
}
