<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // cart belongs to one user and can have many products
    public function index($id)
    {
        return view('cart.index');
    }

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
    }
}
