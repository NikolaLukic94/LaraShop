<?php

use Illuminate\Database\Seeder;

class OrderItemsStatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('order_item_status_codes')->insert([
            'name' => 'Delivered',
        ]);

		DB::table('order_item_status_codes')->insert([
            'name' => 'Out of Stock',
        ]);
    }
}
