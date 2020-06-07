<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddresses extends FormRequest
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
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'phone_number' => 'required|numeric|min:6|max:15',
            'address_line_1' => 'required|unique:addresses|min:2|max:50',
            'address_line_2' => 'sometimes|min:2|max:50',
            'city' => 'required|min:2|max:50',
            'county' => 'required|min:2|max:50',
            'zip' => 'required|numeric|min:5|max:5',
            'country' => 'required|min:2|max:50',
            'user_id' => 'required|numeric',
        ];
    }
}
