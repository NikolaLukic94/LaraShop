<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);
    }

    public function show($id)
    {
        return view('roles.show', [
            'role' => Role::findOrFail($id),
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

        return redirect('roles/index');
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
