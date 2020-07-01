<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\InvoiceStatusCode;
Use App\Models\Invoice;

$orders = Order::all();

foreach ($orders as $order) {
    $factory->define(Invoice::class, function (Faker $faker) {
        return [
            'order_id' => $order->id,
            'invoice_status_code_id' => rand(1, InvoiceStatusCode::all()->count()),
            'date' => $faker->date,
            'invoice_details' => $faker->paragraph,
        ];
    });
}


