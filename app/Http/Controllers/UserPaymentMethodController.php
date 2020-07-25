<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPaymentMethod;
use App\Http\Requests\StoreUserPaymentMethod;
use App\Http\Requests\UpdateUserPaymentMethod;
use Illuminate\Http\Request;

class UserPaymentMethodController extends Controller
{
    public function store(Request $request)
    {
        UserPaymentMethod::create([
            'ccv' => $request->ccv,
            'year' => $request->year,
            'cardType' => $request->cardType,
            'owner' => $request->owner,
            'credit_card_number' => $request->cardNumber,
            'user_id' => Auth::id(),
            'expiration' => $request->expiration,
            'payment_method_id' => $request->paymentMethodId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User payment method has been added!'
        ]);
    }

    public function update(UpdateUserPaymentMethod $request, $id)
    {
        $userPaymentMethod = UserPaymentMethod::find($id);

        $userPaymentMethod->credit_card_number = $required->creditCardNumber;
        $userPaymentMethod->user_id = $required->userId;
        $userPaymentMethod->payment_method_id = $required->paymentMethodId;

        $userPaymentMethod->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User payment method has been updated!'
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
