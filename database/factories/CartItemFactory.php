<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Cart;

$factory->define(CartItem::class, function (Faker $faker) {
    return [
        'quantity' => $faker->rand(1, 199),
        'product_id' => rand(1, Product::all()->count()),
        'cart_id' => rand(1, Cart::all()->count())
    ];
});
