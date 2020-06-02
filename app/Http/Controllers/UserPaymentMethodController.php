<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserPaymentMethod;
use Illuminate\Http\Request;

class UserPaymentMethodController extends Controller
{
    public function store(StoreUserPaymentMethod $request)
    {
        UserPaymentMethod::create([
            'credit_card_number' => $required->creditCardNumber,
            'user_id' => $required->userId,
            'payment_method_id' => $required->paymentMethodId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User payment method has been added!'
        ]);
    }

    public function delete($id) 
    {
        $userPaymentMethod = UserPaymentMethod::find($id);

        $userPaymentMethod->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'User payment method has been deleted'
        ]);
    }
}
