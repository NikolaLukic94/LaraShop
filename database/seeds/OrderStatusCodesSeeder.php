<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

		DB::table('order_status_codes')->insert([
            'name' => 'Completed',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('order_status_codes')->insert([
            'name' => 'Cancelled',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
