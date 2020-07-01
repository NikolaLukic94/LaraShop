<?php

use Illuminate\Database\Seeder;
use App\Models\ShipmentStatus;

class ShipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentStatus::create([
            'name' => 'In Queue'
        ]);

        ShipmentStatus::create([
            'name' => 'In Progress'
        ]);

        ShipmentStatus::create([
            'name' => 'Completed'
        ]);
    }
}
