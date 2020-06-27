<?php

namespace App\Http\Controllers;

use App\Models\ShipmentItem;
use App\Http\Requests\StoreShipmentItem;
use App\Http\Requests\UpdateShipmentItem;
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

    public function update(UpdateShipmentItem $request, $id)
    {
        $shipmentItem = ShipmentItem::find($id);

        $shipmentItem->shipment_id = $request->shipmentId;
        $shipmentItem->order_item_id = $request->orderItemId;        

        $shipmentItem->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Shipment item has been updated',
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
