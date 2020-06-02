<?php

namespace App\Http\Controllers;

use App\Http\Request\StoreShipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function store(StoreShipment $request)
    {
        Shipment::create([
            'order_id' => $request->orderId,
            'invoice_id' => $request->invoiceId,
            'tracking_number' => $request->trackingNumber,
            'date' => $request->date,
            'other_shipment_details' => $request->otherShipmentDetails
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Shipment has been created'
        ]);
    }

    public function delete($id) 
    {
        $shipment = Shipment::find($id);

        $shipment->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Shipment has been deleted'
        ]);
    }
}
