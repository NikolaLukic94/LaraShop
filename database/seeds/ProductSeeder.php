<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Win10 Key',
            'description' => 'Windows 10 activation key',
            'price' => 19,// change type to float
            'quantity' => rand(4, 99),
            'product_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('products')->insert([
            'name' => 'Mic',
            'description' => 'High quality mic',
            'price' => 19,// change type to float
            'quantity' => rand(4, 99),
            'product_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
