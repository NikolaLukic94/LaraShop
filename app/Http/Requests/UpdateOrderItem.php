<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItem extends FormRequest
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
            'user_id' => 'sometimes|numeric',
            'order_item_status_code_id' => 'sometimes|numeric',
            'product_id' => 'sometimes|numeric',
            'quantity' => 'sometimes|numeric',
            'price' => 'sometimes|numeric',
        ];
    }
}
