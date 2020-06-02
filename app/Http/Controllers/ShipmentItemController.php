<?php

namespace App\Http\Controllers;

use App\Http\Request\StoreShipmentItem;
use Illuminate\Http\Request;

class ShipmentItemController extends Controller
{
    public function store(StoreShipmentItem $request)
    {
        ShipmentItem::create([
            'shipment_id' => $request->shipmentId,
            'order_item_id' => $request->orderItemId
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Shipment item has been created',
        ]);
    }

    public function delete($id) 
    {
        $shipmentItem = ShipmentItem::find($id);

        $shipmentItem->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Shipment item has been deleted'
        ]);
    }
}
