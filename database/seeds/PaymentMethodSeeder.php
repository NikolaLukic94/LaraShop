<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'skrill',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'paypal',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
