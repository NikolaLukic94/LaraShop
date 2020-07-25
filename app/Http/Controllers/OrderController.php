<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Http\Request;
use App\Http\Resources\Order as OrderResource;

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

    public function store(StoreOrder $request) 
    {
        // need to create order items and order
        DB::beginTransaction();

        try {

            $order = Order::create([
                'date_placed' => $request->datePlaced,
                'order_details' => $request->orderDetails,
                'user_id' => $request->userId,
                'order_status_codes_id' => $request->orderStatusCodeId,
            ]);

            $cartItems = Cart::where('user_id', Auth::id())->cartItems;

            $paymentAmount = 0;

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'order_item_status_code_id' => 1,
                    'product_id' => $cartItem->product_id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity
                ]);

                $paymentAmount += $cartItem->price * $cartItem->quantity;
            }

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'invoice_status_code_id' => 1,
                'date' => new Date(),
                'invoice_details' => 'test'
            ]);

            Payment::create([
                'invoice_id' => $invoice,
                'payment_date' =>  new Date(),
                'paymentAmount' => $paymentAmount,
                'payment_methods' => 1
            ]);

            $shipment = Shipment::create([
                'order_id' => $order->id,
                'invoice_id' => $invoice->id,
                'tracking_number' => rand(1,9999999),
                'date' => new Date()
            ]);

            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $orderItem) {
                ShipmentItem::create([
                    'shipment_id' => $shipment,
                    'order_item_id' => $orderItem->id
                ]);
            }

            // DB::insert(...);

            // if paperback, send an email to admin to receive notification about pending shipment
        
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

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
