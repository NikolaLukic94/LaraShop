<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

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

         $role = Role::first();

         $permissions = Permission::get();

         foreach ($permissions as $permission)
         {
             DB::table('role_has_permissions')->insert([
                 'role_id' => $role->id,
                 'permission_id' => $permission->id
             ]);
         }
    }
}
