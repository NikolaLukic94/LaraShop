<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\UserRelationshipsResource as UserRelationshipsResource;

class UserController extends Controller
{
    /**
     * Return a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //return collection of articles as a resource
        return UserResource::collection(
            User::paginate(15)
        );
    }

    public function index()
    {
        return view('users.index');
    }

    public function getUserData($id = null)
    {
        $id = $id !== null ? $id : Auth::id();

        return new UserResource(
            User::find($id)
        );
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password // encode
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'New user added!',
            'user' => new UserResource($user)
        ]);
    }

    public function show($id)
    {
        return view('users.show', [
            'permissions' => Permission::all(),
            'user' => User::find($id),
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->syncRoles($request->roles);

        $user->syncPermissions($request->permissions);

        return redirect('/users/show/' . $user->id);
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product type has been deleted'
        ]);
    }
}
