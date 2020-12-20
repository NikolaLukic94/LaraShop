<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'user' => Auth::user()
        ]);
    }

    public function show(Role $role)
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
