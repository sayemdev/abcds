<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeVisitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required|integer',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'zoom_level' => 'required|integer',
            'visit_date' => 'required|date',
            'attach' => 'nullable|string',
            'read' => 'nullable|string',
            'status' => 'required|string',
            'branch_id' => 'required|integer',
            'visit_address' => 'required|string',
        ];
    }
}
