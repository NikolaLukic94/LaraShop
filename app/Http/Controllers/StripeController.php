<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

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

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('stripe.home');
    }
  
    /**
     * handling payment with POST
     */
    public function store(Request $request)
    {
        // todo: delete cart items

        // try {
            // Handle Stripe transaction

            // Create an order
            $order = Order::create([
                'date_placed' => date('Y-m-d'),
                'order_details' => "request->orderDetails",
                'user_id' => Auth::id(),
                'order_status_codes_id' => 1,
            ]);
            // Get cart items
            $cart =  Cart::where('user_id', Auth::id())->first();
            $cartItems = $cart->cartItems;

        
            // Create order item out of each cart item
            foreach ($cartItems as $cartItem) {
                // todo: maybe use hydrate here
                OrderItem::create([
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'order_item_status_code_id' => 1,
                    'product_id' => $cartItem->product_id,
                    'price' => 12, //$cartItem->price,
                    'quantity' => $cartItem->quantity
                ]);

            }
            // TODO: Empty the cart

            // Create an invoice that will save data in the system
            $invoice = Invoice::create([
                'order_id' => $order->id,
                'invoice_status_code_id' => 1,
                'date' => Carbon::now()->format('Y-m-d'),
                'invoice_details' => 'test'
            ]);
            // Shippment - can be the date when email with link
            // to downloading books is sent,
            // or actual shipment details

            // if first, set it automatically to complete
            $shipment = Shipment::create([
                'order_id' => $order->id,
                'invoice_id' => $invoice->id,
                'tracking_number' => rand(1, 9999999),
                'date' =>  Carbon::now()->format('Y-m-d'),
                // 'other_shipment_details' => 'test'
            ]);

            // Create shipment item out of each order item
            // $orderItems = OrderItem::where('order_id', $order->id)->get();
            foreach ($order->orderItems as $orderItem) {

                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'order_item_id' => $orderItem->id,
                    'user_address_id' => null,
                ]);
            }

            $cartItemIds = $cart->cartItems->pluck(
                'id'
            )->flatten();

            foreach ($cartItemIds as $cid) {
                $cc = CartItem::find($cid);
                $cc->delete();
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            Stripe\Charge::create ([
                    "amount" => 100, // redo
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => $request->description ?: 'Test',
            ]);

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
