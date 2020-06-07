<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipment extends FormRequest
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
            'order_id' => 'required|numeric',
            'invoice_id' => 'required|numeric',
            'tracking_number' => 'required|numeric',
            'date' => 'required|unique:products|date',
            'other_shipment_details' => 'sometimes||min:2|max:50',
        ];
    }
}
