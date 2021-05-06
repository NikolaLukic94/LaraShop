<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index()
    {
        return auth()->user()->getAllPermissions()->pluck('name')->flatten(); // todo: redo
    }
}
