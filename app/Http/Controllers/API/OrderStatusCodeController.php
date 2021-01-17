<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderStatusCode;
use App\Http\Resources\OrderStatusCode as OrderStatusCodeResource;

class OrderStatusCodeController extends Controller
{
    public function __invoke()
    {
        return OrderStatusCodeResource::collection(
            OrderStatusCode::paginate(15)
        );
    }
}
