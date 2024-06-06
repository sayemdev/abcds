<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShiftRequest extends FormRequest
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
            'description' => 'nullable|string',
            'min_start' => 'required|date_format:H:i',
            'start' => 'required|date_format:H:i',
            'max_start' => 'required|date_format:H:i',
            'min_end' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i',
            'max_end' => 'required|date_format:H:i',
            'break_time' => 'required|integer|min:0',
            'days' => 'required|array',
            'days.*' => 'required|string|in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'recurring' => 'required|boolean',
            'repeat_week'=>'nullable|string',
            'endson' => 'nullable|date',
            'status' => 'required|string|in:active,inactive',
        ];
    }
}
