<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Shipment;

$orders = Order::all();

foreach ($orders as $order) {
    $factory->define(Shipment::class, function (Faker $faker) {
        return [
            'order_id' => $order->id,
            'invoice_id' => $order->invoice->id,
            'tracking_number' => rand(1, 99999),
            'date' => $faker->date,
            'other_shipment_details' => $faker->sentence,
        ];
    });
}



// $table->unsignedBigInteger('order_id')->nullable();
// $table->foreign('order_id')->references('id')->on('orders');

// $table->unsignedBigInteger('invoice_id')->nullable();
// $table->foreign('invoice_id')->references('id')->on('invoices');

// $table->string('tracking_number');
// $table->date('date');
// $table->text('other_shipment_details');
