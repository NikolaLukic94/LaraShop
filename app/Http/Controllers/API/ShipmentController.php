<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Http\Resources\Shipment as ShipmentResource;

class ShipmentController extends Controller
{
    public function index()
    {
        return ShipmentResource::collection(
            Shipment::paginate(15)
        );
    }
}
