<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'patient_id' => 'sometimes|required|exists:patients,id',
            'branch_id' => 'sometimes|required|exists:branches,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
            'contract_id' => 'sometimes|required|exists:contracts,id',
            'date' => 'sometimes|required|date',
            'discount' => 'sometimes|numeric|min:0',
            'paid' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|required|in:pending,completed,cancelled',
            'tests' => 'sometimes|array|required_without:cultures',
            'tests.*.id' => 'required_with:tests|exists:tests,id',
            'tests.*.price' => 'required_with:tests|numeric|min:0',
            'cultures' => 'sometimes|array|required_without:tests',
            'cultures.*.id' => 'required_with:cultures|exists:cultures,id',
            'cultures.*.price' => 'required_with:cultures|numeric|min:0',
        ];
    }
}
