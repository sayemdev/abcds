<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimesheetRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'hours' => 'required|integer|min:1|max:8',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:pending,approved,rejected,completed',
        ];
    }
}
