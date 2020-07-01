<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('order_item_status_codes')->insert([
            'name' => 'Pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('order_item_status_codes')->insert([
            'name' => 'In Process',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

		DB::table('order_item_status_codes')->insert([
            'name' => 'Out of Stock',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
