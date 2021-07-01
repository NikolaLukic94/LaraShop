<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
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
        return Permission::all();
    }

}
