<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
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
        return view('welcome',[
            'stripeKey' => config('stripe.stripeKey')
        ]);
    }
}
