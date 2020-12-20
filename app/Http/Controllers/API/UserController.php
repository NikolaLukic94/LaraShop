<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\UserRelationshipsResource as UserRelationshipsResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::paginate(15)
        );
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function authUser()
    {
        $user = Auth::user();

        return new UserResource($user);
    }
}
