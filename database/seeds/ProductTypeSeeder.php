<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'name' => 'hardware',
            'description' => Str::random(10),
        ]);

        DB::table('product_types')->insert([
            'name' => 'software',
            'description' => Str::random(10),
        ]);
    }
}
