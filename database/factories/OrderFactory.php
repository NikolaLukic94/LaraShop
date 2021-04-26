<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Status;
use Faker\Generator as Faker;
use App\Models\User;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'status_id' => factory(Status::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
        'date_placed' => $faker->dateTimeBetween('+1 week', '+6 month')
    ];
});
