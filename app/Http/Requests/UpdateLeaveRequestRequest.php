<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveRequestRequest extends FormRequest
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
    public function rules()
    {
        return [
            'leave_id' => 'exists:leave_settings,id',
            'employee_id' => 'exists:employees,id',
            'from' => 'date',
            'to' => 'date|after_or_equal:from',
            'reason' => 'string',
            'status' => 'in:pending,approved,rejected',
        ];
    }
}
