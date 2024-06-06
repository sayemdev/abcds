<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceTestRequest extends FormRequest
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
            'invoice_id' => 'exists:invoices,id',
            'test_id' => 'nullable|exists:tests,id',
            'culture_id' => 'nullable|exists:cultures,id',
            'price' => 'numeric|min:0',
        ];
    }
}
