<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use App\Models\User;
use Faker\Generator as Faker;
use App\Models\UserAddress;

$users = User::count();


$factory->define(UserAddress::class, function (Faker $faker) use ($users) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->streetSuffix,
        'city' => $faker->city,
        'county' => $faker->cityPrefix,
        'zip' => $faker->postcode,
        'country' => $faker->country,
        'user_id' => numberBetween($min = 1, $max = $users)
    ];
});

