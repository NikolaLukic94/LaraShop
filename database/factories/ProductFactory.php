<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductType;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => 14,
        'quantity' => $faker->randomDigitNotNull,
        'product_type_id' => factory(ProductType::class)->create()->id,
    ];
});
