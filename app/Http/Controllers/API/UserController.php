<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource as UserResource;
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
        return true;
    }

    public function permissions()
    {
        return Auth::user()->getAllPermissions()->pluck('name')->flatten();
    }
}
