<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Resources\Role as RoleResource;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __invoke()
    {
        return RoleResource::collection(
            Role::paginate(15)
        );
    }

    public function show(\Spatie\Permission\Models\Role $role)
    {
        return view('roles.show', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->syncPermissions($request->permissionsId);

        return redirect('roles');
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return redirect('roles/index');
    }
}
