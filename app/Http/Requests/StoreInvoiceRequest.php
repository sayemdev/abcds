<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Assuming authorization is handled elsewhere
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'branch_id' => 'required|exists:branches,id',
            'doctor_id' => 'required|exists:doctors,id',
            'contract_id' => 'required|exists:contracts,id',
            'date' => 'required|date',
            'discount' => 'numeric|min:0',
            'paid' => 'numeric|min:0',
            'status' => 'required|in:pending,completed,cancelled',
            'tests' => 'array|required_without:cultures',
            'tests.*.id' => 'required_with:tests|exists:tests,id',
            'tests.*.price' => 'required_with:tests|numeric|min:0',
            'cultures' => 'array|required_without:tests',
            'cultures.*.id' => 'required_with:cultures|exists:cultures,id',
            'cultures.*.price' => 'required_with:cultures|numeric|min:0',
        ];
    }
}
