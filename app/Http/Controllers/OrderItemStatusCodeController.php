<?php

namespace App\Http\Controllers;

use App\Models\OrderItemStatusCode;

use App\Http\Requests\StoreOrderItemStatusCode;
use App\Http\Requests\UpdateOrderItemStatusCode;
use Illuminate\Http\Request;
use App\Http\Resources\OrderItemStatusCode as OrderItemStatusCodeResource;

class OrderItemStatusCodeController extends Controller
{
    public function getAll()
    {
        //return collection of articles as a resource
        return OrderItemStatusCodeResource::collection(
            OrderItemStatusCode::paginate(15)
        );
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
            'createdOrderItemStatusCode' => $newOrderItemStatusCode,
            'status' => 'success',
            'message' => 'New order status code has been added'
        ]);
    }

    public function update(UpdateOrderItemStatusCode $request, $id)
    {
        $orderItemStatusCode = OrderItemStatusCode::find($id);

        $orderItemStatusCode->name = $request->name;

        $orderItemStatusCode->save();

        return response()->json([
            'updatedOrderItemStatusCode' => $orderItemStatusCode,
            'status' => 'success',
            'message' => 'Order item status code has been updated!'
        ]);
    }

    public function delete(OrderItemStatusCode $orderItemStatusCode)
    {
        $orderItemStatusCode->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Order status code status code has been deleted'
        ]);
    }
}
