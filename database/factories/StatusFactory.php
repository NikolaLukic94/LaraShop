<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Status::class, function (Faker $faker) {
    return [
        'name' => 'Test Status',
        'type' => 'Whatever',
    ];
});
