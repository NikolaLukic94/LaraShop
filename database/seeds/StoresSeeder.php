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
            'name' => 'Gallery #1',
            'address' => 'Kneza Mihaila 3',
            'city' => 'Belgrade',
            'state' => 'Serbia',
            'hours' => '9:00am-6:00pm',
            'latitude' => '44.81534194729186',
            'longitude' => '20.45951407401414'
        ]);

        Store::create([
            'name' => 'Gallery #2',
            'address' => 'Vojvode Stepe 10',
            'city' => 'Belgrade',
            'state' => 'Serbia',
            'hours' => '9:00am-6:00pm',
            'latitude' => '44.78600772928174',
            'longitude' => '20.46751629787823'
        ]);

        Store::create([
            'name' => 'Gallery #3',
            'address' => 'Ustanicka 33',
            'city' => 'Belgrade',
            'state' => 'Serbia',
            'hours' => '9:00am-6:00pm',
            'latitude' => '44.788403580668515',
            'longitude' => '20.475040313219793'
        ]);
    }
}
