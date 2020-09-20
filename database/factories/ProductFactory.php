<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        //$faker->sentence   'agent_name' => $faker->name,
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(1,199),
        'color' => $faker->hexcolor,
        'size' => $faker->numberBetween(1,199),
        'quantity' => $faker->numberBetween(1,199),
        'other_product_details' => $faker->paragraph,
        'product_type_id' => $faker->numberBetween(1,2),
    ];
});