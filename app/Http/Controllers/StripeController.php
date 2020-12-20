<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Invoice;
use App\Models\Order;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Order as OrderResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class StripeController extends Controller
{
    public function index()
    {
        return view('cart.checkout', [
            'stripeKey' => env('STRIPE_PUBLISHEABLE_KEY')
        ]);
    }

    public function store(Request $request)
    {
        // try {
            // Handle Stripe transaction

            // Create an order
            $order = Order::create([
                'date_placed' => date('Y-m-d'),
                'order_details' => "request->orderDetails",
                'user_id' => Auth::id(),
                'order_status_codes_id' => 2, // Completed
            ]);

            $cart =  Cart::where('user_id', Auth::id())->first();
            $cartItems = $cart->cartItems;

            // Create order item out of each cart item
            foreach ($cartItems as $cartItem) {

                Redis::zincrby('bestsellers.', 1 , $cartItem);

                OrderItem::create([
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'order_item_status_code_id' => 1, 
                    'product_id' => $cartItem->product_id,
                    'price' => 12, //$cartItem->price,
                    'quantity' => $cartItem->quantity,
                ]);

            }

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'invoice_status_code_id' => 2, // Issued
                'date' => Carbon::now()->format('Y-m-d'),
                'invoice_details' => 'test'
            ]);

            $shipment = Shipment::create([
                'order_id' => $order->id,
                'invoice_id' => $invoice->id,
                'tracking_number' => rand(1, 9999999),
                'date' =>  Carbon::now()->format('Y-m-d'),
            ]);

            foreach ($order->orderItems as $orderItem) {

                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'order_item_id' => $orderItem->id,
                    'user_address_id' => null,
                ]);
            }

            $cartItemIds = $cart->cartItems->pluck('id')->flatten();

            foreach ($cartItemIds as $cid) {
                $cc = CartItem::find($cid);
                $cc->delete();
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            $stripeObject = Stripe\Charge::create ([
                    "amount" => 100, // redo
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => $request->description ?: 'Test',
            ]);

            $stripeObject->order = $order;
            $stripeObject->invoice = $invoice;
            $stripeObject->shipmentItems = $shipment->shipmentItems;

            dispatch(new \App\Jobs\SendSuccessfulPurchaseEmail($stripeObject));

            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => 'Successful purchase! Please check your inbox!',
            ]);

        // } catch (\Exception $e) {
        
        //     return $e->getMessage();
        // }
    }
}
