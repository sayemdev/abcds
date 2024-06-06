<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShiftRequest extends FormRequest
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
            'description' => 'nullable|string',
            'min_start' => 'date_format:H:i',
            'start' => 'date_format:H:i',
            'max_start' => 'date_format:H:i',
            'min_end' => 'date_format:H:i',
            'end' => 'date_format:H:i',
            'max_end' => 'date_format:H:i',
            'break_time' => 'integer|min:0',
            'days' => 'array',
            'days.*' => 'string|in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'recurring' => 'boolean',
            'repeat_week'=>'nullable|string',
            'endson' => 'nullable|date',
            'status' => 'string|in:active,inactive',
        ];
    }
}
