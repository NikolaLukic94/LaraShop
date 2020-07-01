<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //$faker->sentence   'agent_name' => $faker->name,
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => rand(1,199),
        'color' => $faker->hexcolor,
        'size' => rand(1,199),
        'quantity' => rand(1,199),
        'other_product_details' => $faker->paragraph,
        'product_type_id' => rand(1,2),
    ];
});