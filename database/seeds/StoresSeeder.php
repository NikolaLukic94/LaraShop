<?php

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'First Shop',
            'address' => '4142 SW Testing Way',
            'city' => 'Orlando',
            'state' => 'FL',
            'hours' => '9:00am-6:00pm',
            'latitude' => 28.452763,
            'longitude' => -81.412228
        ]);

        Store::create([
            'name' => 'Second Shop',
            'address' => '28275 Test Lane',
            'city' => 'Orlando',
            'state' => 'FL',
            'hours' => '10:00am-6:00pm',
            'latitude' => 28.473342,
            'longitude' => -81.491581
        ]);

        Store::create([
            'name' => 'Thrid Shop',
            'address' => '352 Faking Drive',
            'city' => 'Orlando',
            'state' => 'FL',
            'hours' => '7:00am-6:00pm',
            'latitude' => 28.526046,
            'longitude' => -81.396101
        ]);
    }
}
