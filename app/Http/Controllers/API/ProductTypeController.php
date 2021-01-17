<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Http\Resources\ProductType as ProductTypeResource;

class ProductTypeController extends Controller
{
    public function __invoke()
    {
        return ProductTypeResource::collection(
            ProductType::paginate(15)
        );
    }
}
