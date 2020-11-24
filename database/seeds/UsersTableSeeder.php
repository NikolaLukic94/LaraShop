<?php

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
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        // $role = Role::where('name', 'superadmin')->first();
        // $admin->roles->sync($role->id);
        // $admin->assignRole('superadmin');
    }
}
