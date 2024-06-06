<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string',
            'employee_id' => 'required|string|unique:employees',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required|string',
            'profile' => 'nullable|string',
            'join_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:join_date',
            'password' => 'required|string|min:8',
            'branch' => 'nullable|string', // New field: Branch
            'designation' => 'nullable|string', // New field: Designation
        ];
    }
}
