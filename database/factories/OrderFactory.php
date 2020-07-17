<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'date_placed' => $faker->date,
        'order_details' => $faker->word,
        'user_id' => rand(1, User::all()->count()),
        'order_status_codes_id' => rand(1,3)
    ];
});
