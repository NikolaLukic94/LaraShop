<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentMethod;
use App\Http\Requests\UpdatePaymentMethod;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Resources\UsersPaymentMethod as PaymentMethodResource;

class PaymentMethodController extends Controller
{
    public function getAll()
    {
    	$paymentMethods = PaymentMethod::paginate(15);
        //return collection of articles as a resource
        return PaymentMethodResource::collection($paymentMethods);
    }

    public function index()
    {
    	return view('paymentMethods.index');
    }

    public function store(StorePaymentMethod $request) 
    {
        $newPaymentMethod = PaymentMethod::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdPaymentMethod' => $newPaymentMethod,
            'status' => 'success',
            'message' => 'New order status code has been added'
        ]);
    }

    public function update(UpdatePaymentMethod $request, $id) 
    {
        $paymentMethod = PaymentMethod::find($id);

        $paymentMethod->name = $request->name;

        $paymentMethod->save();

        return response()->json([
            'paymentMethod' => $paymentMethod,
            'status' => 'success',
            'message' => 'Payment method has been updated'
        ]);
    }

    public function delete($id) 
    {
        $paymentMethod = PaymentMethod::find($id);

        $paymentMethod->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Order status code status code has been deleted'
        ]);
    }
}
