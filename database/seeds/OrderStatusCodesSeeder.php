<?php

use Illuminate\Database\Seeder;

class OrderStatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('order_status_codes')->insert([
            'name' => 'Pending',
        ]);

		DB::table('order_status_codes')->insert([
            'name' => 'Completed',
        ]);

        DB::table('order_status_codes')->insert([
            'name' => 'Cancelled',
        ]);
    }
}
