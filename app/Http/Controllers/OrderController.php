<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Order as OrderResource;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Order::paginate(15);

        return OrderResource::collection($orders);
    }

    public function index()
    {
        return view('orders.index');
    }

    //StoreOrder
    public function store(Request $request)
    {
        // need to create order items and order
//        DB::beginTransaction();
//
//        try {

            $order = Order::create([
                'date_placed' => date('Y-m-d'),
                'order_details' => "request->orderDetails",
                'user_id' => Auth::id(),
                'order_status_codes_id' => 1,
            ]);

            $cartItems = Cart::where('user_id', Auth::id())->first()->cartItems;

            $paymentAmount = 0;

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'order_item_status_code_id' => 1,
                    'product_id' => $cartItem->product_id,
                    'price' => 12, //$cartItem->price,
                    'quantity' => $cartItem->quantity
                ]);

                $paymentAmount += $cartItem->price * $cartItem->quantity;
            }

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'invoice_status_code_id' => 1,
                'date' => Carbon::now(),
                'invoice_details' => 'test'
            ]);

            Payment::create([
                'invoice_id' => $invoice,
                'payment_date' => Carbon::now(),
                'paymentAmount' => 12,//$paymentAmount,
                'payment_methods' => 1
            ]);

            $shipment = Shipment::create([
                'order_id' => $order->id,
                'invoice_id' => $invoice->id,
                'tracking_number' => rand(1, 9999999),
                'date' => Carbon::now()->toDateString(),
                'other_shipment_details' => 'test'
            ]);

            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $orderItem) {
                ShipmentItem::create([
                    'shipment_id' => $shipment,
                    'order_item_id' => $orderItem->id,
                    'other_shipment_details' => 'none'
                ]);
            }

            // DB::insert(...);

            // if paperback, send an email to admin to receive notification about pending shipment

//            DB::commit();
            // all good
//        } catch (\Exception $e) {
//            DB::rollback();
            // something went wrong
//        }

        // todo: auto delete user address if not saved for future use
        // or maybe save it and don't ask user, even better

        // todo: auto delete payment data if not save for future use

        return response()->json([
            'status' => 'success',
            'message' => 'New order has been placed!'
        ]);
    }

    public function update(UpdateOrder $request, $id)
    {
        $order = Order::find($id);

        $order->date_placed = $request->datePlaced;
        $order->order_details = $request->orderDetails;
        $order->user_id = $request->userId;
        $order->order_status_codes_id = $request->orderStatusCodeId;

        $order->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been updated!'
        ]);
    }

    public function delete($id)
    {
        $order = Order::find($id);

        $order->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been deleted'
        ]);
    }
}
