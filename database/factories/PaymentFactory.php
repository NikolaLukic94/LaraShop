<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\models\Payment;
use App\Models\Invoice;
use App\Models\PaymentMethod;

$invoices = Invoice::all();

foreach ($invoices as $invoice) {
    $factory->define(Payment::class, function (Faker $faker) {
        return [
            'invoice_id' => $invoice->id,
            'payment_method_id' => rand(1, PaymentMethod::all()->count()),
            'payment_date' => $faker->date,
            'payment_amount' => rand(1, 199)
        ];
    });
    
}

