<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sidebar()
    {
        return view('sidebar');
    }

    public function welcome()
    {
        $mostPopularProducts = Product::take(6)->get();
        $recomendedProducts = Product::take(6)->get();

        return view('welcome', [
            'mostPopularProducts' => $mostPopularProducts,
            'recomendedProducts' => $recomendedProducts
        ]);
    }
}
