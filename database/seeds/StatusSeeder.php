<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = config('seeders.statuses');

        foreach ($statuses as $status) {
            \App\Models\Status::create([
                'type' => $status[0],
                'name' => $status[1]
            ]);
        }
    }
}
