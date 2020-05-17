<?php

use Illuminate\Database\Seeder;

class UserPaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_payment_methods')->insert([
            'credit_card_number' => '8888999944445555',
            'user_id' => 1,
            'payment_method_id' => 1
        ]);

        DB::table('user_payment_methods')->insert([
            'credit_card_number' => '7777555544441111',
            'user_id' => 1,
            'payment_method_id' => 2
        ]);
    }
}
