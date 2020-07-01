<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Models\ShipmentItem;

$shipments = Shipment::all();

foreach ($shipments as $shipment) {
    $factory->define(ShipmentItem::class, function (Faker $faker) {
        return [
            'shipment_id' => $shipment->id,
            'order_item_id' => $shipment->order->id
        ];
    });
}
