<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'employee' => 'required|integer|exists:employees,id',
            'date' => 'required|date',
            'shift_id' => 'required|exists:shifts,id',
            'accept_extra_hours' => 'boolean',
            'status' => 'required|string|in:publish,draft',
        ];
    }
}
