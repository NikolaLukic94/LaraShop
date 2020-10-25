<?php

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CuponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'DEMO111',
            'type' => 'fixed',
            'value' => 30
        ]);

        Coupon::create([
            'code' => 'DEMO121',
            'type' => 'percent',
            'percent_off' => 50
        ]);
    }
}
