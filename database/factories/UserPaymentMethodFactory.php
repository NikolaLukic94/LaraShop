<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\UserPaymentMethod;

$usersCount = User::all()->count();

$factory->define(UserPaymentMethod::class, function (Faker $faker) {
    return [
        'credit_card_number' => $faker->creditCardNumber,
        'owner' => $faker->name,
        'cardType' => $faker->creditCardType,
        'payment_method_id' => rand(1,3),
        'user_id' => rand(1, $usersCount)
    ];
});
