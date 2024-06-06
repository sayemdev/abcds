<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => 'string',
            'employee_id' => 'string|unique:employees,employee_id,' . $this->route('employee')->id,
            'email' => 'email|unique:employees,email,' . $this->route('employee')->id,
            'mobile' => 'string',
            'profile' => 'nullable|string',
            'join_date' => 'date',
            'end_date' => 'nullable|date|after_or_equal:join_date',
            'password' => 'string|min:8',
            'branch' => 'nullable|string', // New field: Branch
            'department' => 'nullable|string', // New field: Department
            'designation' => 'nullable|string', // New field: Designation
        ];
    }
}
