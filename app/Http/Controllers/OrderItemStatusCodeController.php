<?php

namespace App\Http\Controllers;

use App\Request\StoreOrderItemStatusCode;
use App\OrderItemStatusCode;
use Illuminate\Http\Request;
use App\Http\Resources\OrderItemStatusCode as OrderItemStatusCodeResource;

class OrderItemStatusCodeController extends Controller
{
    public function getAll()
    {
    	$orderItemStatusCodes = OrderItemStatusCode::paginate(15);
        //return collection of articles as a resource
        return OrderItemStatusCodeResource::collection($orderItemStatusCodes);
    }

    public function index()
    {
    	return view('orderItemStatusCodes.index');
    }

    public function store(StoreOrderItemStatusCode $request) 
    {
        $newOrderItemStatusCode = OrderItemStatusCode::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdInvoice' => $newOrderItemStatusCode,
            'status' => 'success',
            'message' => 'New order status code has been added'
        ]);
    }

    public function delete($id) 
    {
        $orderItemStatusCode = OrderItemStatusCode::find($id);

        $orderItemStatusCode->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order status code status code has been deleted'
        ]);
    }
}
