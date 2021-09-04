<?php

namespace App\Http\Controllers;

use App\Jobs\SendSuccessfulPurchaseEmail;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Stripe;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function store(Request $request)
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d');

            $order = Order::create([
                'date_placed' => date('Y-m-d'),
                'order_details' => $request->orderDetails,
                'user_id' => Auth::id(),
                'status_id' => 1,
            ]);

            $cartItems = OrderItem::with('product')->where('order_id', null)->where('user_id', Auth::id())->get();

            $products = $cartItems->pluck('product')->flatten();

            foreach ($products as $product) {
                Redis::zincrby('bestsellers', $product->quantity,  $product);
            }

            $paymentAmount = $cartItems->pluck('price')->sum();

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'status_id' => 1,
                'date' => $currentDate,
                'invoice_details' => 'test'
            ]);

            Payment::create([
                'invoice_id' => $invoice->id,
                'payment_date' => $currentDate,
                'payment_amount' => $paymentAmount,
                'payment_methods' => 1
            ]);

            $shipment = Shipment::create([
                'order_id' => $order->id,
                'invoice_id' => $invoice->id,
                'tracking_number' => rand(1, 9999999),
                'date' => $currentDate,
                'other_shipment_details' => 'test'
            ]);

            foreach ($cartItems as $orderItem) {
                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'order_item_id' => $orderItem->id,
                    'other_shipment_details' => 'none'
                ]);

                $orderItem->order_id = $order->id;
                $orderItem->save();
            }

            // Handle Stripe transaction

            Stripe\Stripe::setApiKey(config('stripe.stripeSecret'));
//
            Stripe\Charge::create([
                "amount" => $paymentAmount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $request->description ?: 'Test',
            ]);


//            dispatch(new SendSuccessfulPurchaseEmail($stripeObject)); // TODO: redo w/ QUEUE

            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => 'Successful purchase! Please check your inbox!',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'success',
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
