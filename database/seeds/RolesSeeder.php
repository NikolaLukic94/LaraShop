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

        // $role = Role::first();

        // $permissions = Permission::get()->toArray();

        // $permissions = array_column($permissions, 'id');

        // $role->syncPermissions([$permissions]);
    }
}
