<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
            'date_placed' => 'somethimes|date',
            'order_details' => 'somethimes|min:2',
            'user_id' => 'somethimes|numeric',
            'order_status_codes_id' => 'somethimes|numeric',
        ];
    }
}
