<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderStatusCode as OrderStatusCodeResource;
use Illuminate\Http\Request;
use App\OrderStatusCode;

class OrderStatusCodeController extends Controller
{
    public function getAll()
    {
    	$codes = OrderStatusCode::paginate(15);
        //return collection of articles as a resource
        return OrderStatusCodeResource::collection($codes);
    }

    public function index()
    {
    	return view('orderStatusCodes.index');
    }

    public function store(Request $request) 
    {
        $codes = OrderStatusCode::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdInvoice' => $codes,
            'status' => 'success',
            'message' => 'New order item status code has been added'
        ]);
    }

    public function delete($id) 
    {
        $codes = OrderStatusCode::find($id);

        $codes->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order item status code status code has been deleted'
        ]);
    }
}
