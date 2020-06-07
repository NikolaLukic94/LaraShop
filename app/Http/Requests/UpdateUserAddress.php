<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAddress extends FormRequest
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
            'first_name' => 'sometimes|min:2|max:50',
            'last_name' => 'sometimes|min:2|max:50',
            'phone_number' => 'sometimes|numeric|min:6|max:15',
            'address_line_1' => 'sometimes|unique:addresses|min:2|max:50',
            'address_line_2' => 'sometimes|min:2|max:50',
            'city' => 'sometimes|min:2|max:50',
            'county' => 'sometimes|min:2|max:50',
            'zip' => 'sometimes|numeric|min:5|max:5',
            'country' => 'sometimes|min:2|max:50',
            'user_id' => 'sometimes|numeric',
        ];
    }
}
