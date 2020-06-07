<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderStatusCode;
use App\Http\Requests\UpdateOrderStatusCode;
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

    public function store(StoreOrderStatusCode $request) 
    {
        $codes = OrderStatusCode::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdInvoice' => $codes,
            'status' => 'success',
            'message' => 'New order status code has been added'
        ]);
    }

    public function update(UpdateOrderStatusCode $request) 
    {
        $code = OrderStatusCode::find($id);

        $code->name = $request->name;

        $code->save();

        return response()->json([
            'updatedOrderStatusCode' => $code,
            'status' => 'success',
            'message' => 'Order status code has been updated!'
        ]);
    }

    public function delete($id) 
    {
        $codes = OrderStatusCode::find($id);

        $codes->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order status code status code has been deleted'
        ]);
    }
}
