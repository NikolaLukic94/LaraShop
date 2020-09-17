<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@email.com',
            'password' => bcrypt('password'),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
