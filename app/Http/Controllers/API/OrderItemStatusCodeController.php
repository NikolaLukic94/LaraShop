<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderItemStatusCode;
use App\Http\Resources\OrderItemStatusCode as OrderItemStatusCodeResource;

class OrderItemStatusCodeController extends Controller
{
    public function __invoke()
    {
        return OrderItemStatusCodeResource::collection(
            OrderItemStatusCode::paginate(15)
        );
    }
}
