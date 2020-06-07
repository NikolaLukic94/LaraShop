<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPaymentMethod extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'credit_card_number' => 'sometimes|numeric|min:8|max:50',
            'user_id' => 'sometimes|numeric',
            'payment_method_id' => 'sometimes|numeric',
        ];
    }
}
