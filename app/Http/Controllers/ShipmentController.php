<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\StoreShipment;
use App\Http\Requests\UpdateShipment;
use Illuminate\Http\Request;
use App\Http\Resources\Shipment as ShipmentResource;

class ShipmentController extends Controller
{
    public function getAll()
    {
        return ShipmentResource::collection(
            Shipment::paginate(15)
        );
    }

    public function index()
    {
        return view('shipments.index');
    }

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

    public function update(UpdateShipment $request, $id)
    {
        $shipment = Shipment::find($id);

        $shipment->order_id = $request->orderId;
        $shipment->invoice_id = $request->invoiceId;
        $shipment->tracking_number = $request->trackingNumber;
        $shipment->date = $request->date;
        $shipment->other_shipment_details = $request->otherShipmentDetails;

        $shipment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Shipment has been updated!'
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
