<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'date_placed' => 'required|date',
            'order_details' => 'somethimes|min:2',
            'user_id' => 'required|numeric',
            'order_status_codes_id' => 'required|numeric',
        ];
    }
}
