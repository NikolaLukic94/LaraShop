<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('orders')->insert([
            'order_status_codes_id' => 1,
            'user_id' => 1,
            'date_placed' => '2020-11-11'
        ]);

		DB::table('orders')->insert([
            'order_status_codes_id' => 2,
            'user_id' => 1,
            'date_placed' => '2020-11-11'
        ]);
    }
}
