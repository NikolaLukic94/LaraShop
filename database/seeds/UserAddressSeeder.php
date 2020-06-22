<?php

use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_addresses')->insert([
            'user_id' => 1,
            'first_name' => 'John',
			'last_name' => 'Doe',
			'phone_number' => '555-888-777',
			'address_line_1' => 'Test st #22',
			'city' => 'LA',
			'county' => 'Slidell',
			'zip' => '85898',
			'country' => 'Test County',
        ]);

        // DB::table('user_addresses')->insert([
        //     'user_id' => 1,
        //     'first_name' => 'Jane',
		// 	'last_name' => 'Doe',
		// 	'phone_number' => '555-888-777',
		// 	'address_line_1' => 'Test st #24',
		// 	'city' => 'LA',
		// 	'county' => 'Slidell',
		// 	'zip' => '85898',
		// 	'country' => 'Test County',
        // ]);
    }
}
