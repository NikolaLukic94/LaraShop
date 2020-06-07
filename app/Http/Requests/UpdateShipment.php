<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipment extends FormRequest
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
            'order_id' => 'sometimes|numeric',
            'invoice_id' => 'sometimes|numeric',
            'tracking_number' => 'sometimes|numeric',
            'date' => 'sometimes|unique:products|date',
            'other_shipment_details' => 'sometimes||min:2|max:50',
        ];
    }
}
