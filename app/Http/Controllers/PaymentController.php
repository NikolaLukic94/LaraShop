<?php

namespace App\Http\Controllers;

use App\Http\Request\StorePayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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
