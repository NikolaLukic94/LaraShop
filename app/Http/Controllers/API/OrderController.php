<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrder;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use App\Http\Resources\Order as OrderResource;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        return OrderResource::collection($orders);
    }


    //StoreOrder
    public function store(Request $request)
    {
        // Implement for any purchase type

        return response()->json([
            'status' => 'success',
            'message' => 'New order has been placed!'
        ]);
    }

    public function update(UpdateOrder $request, $id)
    {
        $order = Order::find($id);

        $order->order_status_codes_id = $request->orderStatusCodeId;

        $order->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been updated!'
        ]);
    }

    public function delete(Order $order)
    {
        $order->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been deleted'
        ]);
    }
}
