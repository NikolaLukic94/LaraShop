<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'Credit Card',
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'skrill',
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'paypal',
        ]);
    }
}
