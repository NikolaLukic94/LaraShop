<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoice extends FormRequest
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
            'invoice_status_code_id' => 'sometimes|numeric',
            'date' => 'sometimes|date',
            'invoice_details' => 'sometimes|alphanumeric',
        ];
    }
}
