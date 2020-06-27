<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\UpdatePayment;
use App\Http\Requests\StorePayment;
use Illuminate\Http\Request;
use App\Http\Resources\Payment as PaymentResource;

class PaymentController extends Controller
{
    public function getAll()
    {
    	$payments = Payment::paginate(15);
        //return collection of articles as a resource
        return PaymentResource::collection($payments);
    }

    public function index()
    {
        return view('payments.index');
    }

    public function store(StorePayment $request)
    {
        Payment::create([
            'invoice_id' => $request->invoiceId,
            'payment_date' => $request->paymentDate,
            'payment_amount' => $request->paymentAmount
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Payment has been created!'
        ]);
    }

    public function update(UpdatePayment $request, $id)
    {
        $payment = Payment::find($id);

        $payment->invoice_id = $request->invoiceId;
        $payment->payment_date = $request->paymentDate;
        $payment->payment_amount = $request->paymentAmount;

        $payment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Payment has been updated!'
        ]);
    }

    public function delete($id) 
    {
        $payment = Payment::find($id);

        $payment->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Payment item has been deleted'
        ]);
    }
}
