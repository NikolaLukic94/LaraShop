<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Resources\Role as RoleResource;

class RoleController extends Controller
{
    public function __invoke()
    {
        return RoleResource::collection(
            Role::paginate(15)
        );
    }
}
