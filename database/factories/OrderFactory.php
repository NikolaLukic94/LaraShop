<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\User;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'order_status_codes_id' => 1,
        'user_id' => $faker->numberBetween(1, User::count()),
        'date_placed' => $faker->dateTimeBetween('+1 week', '+6 month')
    ];
});