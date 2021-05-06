<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
            'api_token' => Illuminate\Support\Str::random(20)
        ]);

        $admin->assignRole('superadmin');
    }
}
