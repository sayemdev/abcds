<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAntibioticRequest extends FormRequest
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
            'name' => 'string|unique:antibiotics,name,' . $this->route('antibiotic')->id,
            'shortcut' => 'string|unique:antibiotics,shortcut,' . $this->route('antibiotic')->id,
            'commercial_name' => 'nullable|string',
        ];
    }
}
