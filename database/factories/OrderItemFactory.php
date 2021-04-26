<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\OrderItem::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'order_id' => factory(Order::class)->create()->id,
        'product_id' => factory(Product::class)->create()->id,
        'quantity' => 4,
        'price' => 5,
    ];
});



