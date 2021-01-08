<?php

namespace App\Http\Controllers;

class CartItemController extends Controller
{
    public function __invoke()
    {
        return view('cart.index');
    }
}
