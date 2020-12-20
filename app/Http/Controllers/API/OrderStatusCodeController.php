<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderStatusCodeController extends Controller
{
    public function __invoke()
    {
        return OrderStatusCodeResource::collection(
            OrderStatusCode::paginate(15)
        );
    }
}
