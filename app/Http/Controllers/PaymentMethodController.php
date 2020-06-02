<?php

use App\Request\StorePaymentMethod;
namespace App\Http\Controllers;
use App\PaymentMethod;
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
