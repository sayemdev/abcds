<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeVisitRequest extends FormRequest
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
            'patient_id' => 'integer',
            'lat' => 'numeric',
            'lng' => 'numeric',
            'zoom_level' => 'integer',
            'visit_date' => 'date',
            'attach' => 'nullable|string',
            'read' => 'nullable|string',
            'status' => 'string',
            'branch_id' => 'integer',
            'visit_address' => 'string',
        ];
    }
}
