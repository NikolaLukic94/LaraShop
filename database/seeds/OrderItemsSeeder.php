<?php

use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'order_status_code_id' => '1',
            'order_item_quantity' => 2,
            'order_item_price' => 12,
        ]);
    }
}
