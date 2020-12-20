<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return ShipmentResource::collection(
            Shipment::paginate(15)
        );
    }
}
