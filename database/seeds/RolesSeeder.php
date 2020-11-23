<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('seeders.roles');

        foreach ($roles as $role) {
            
            Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }

        $permissions = Permission::first();

        $role = Role::where('name', 'superadmin')->first();
        $role->givePermissionTo($permissions->name);
    }
}
