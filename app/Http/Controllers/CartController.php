<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartItem as CartItemResource;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
    }
}
