<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionsResource;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index()
    {
        return auth()->user()->getPermissionsViaRoles()->pluck('name')->flatten();
    }

    public function getAll()
    {
        return PermissionsResource::collection(
            Permission::paginate(15)
        );
    }

}
