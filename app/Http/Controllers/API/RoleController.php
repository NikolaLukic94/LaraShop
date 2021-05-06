<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Resources\Role as RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(
            Role::paginate(15)
        );
    }

    public function show(Role $role)
    {
        return view('roles.show', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
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
