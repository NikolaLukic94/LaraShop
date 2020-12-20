<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderStatusCode;
use App\Http\Requests\UpdateOrderStatusCode;
use App\Http\Resources\OrderStatusCode as OrderStatusCodeResource;
use Illuminate\Http\Request;
use App\Models\OrderStatusCode;

class OrderStatusCodeController extends Controller
{
    public function index()
    {
        return view('orderStatusCodes.index');
    }

    public function store(StoreOrderStatusCode $request)
    {
        $code = OrderStatusCode::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdOrderStatusCode' => $code,
            'status' => 'success',
            'message' => 'New order status code has been added'
        ]);
    }
    // UpdateOrderStatusCode
    public function update(Request $request, $id)
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

    public function destroy(OrderStatusCode $orderStatusCode)
    {
        $orderStatusCode->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Order status code status code has been deleted'
        ]);
    }
}
