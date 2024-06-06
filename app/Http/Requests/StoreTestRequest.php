<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'parent_id' => 'nullable|exists:tests,id',
            'name' => 'required|string|max:255',
            'shortcut' => 'nullable|string|max:255',
            'sample_type' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'reference_range' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'separated' => 'boolean',
            'price' => 'required|numeric',
            'status' => 'boolean',
            'title' => 'nullable|string|max:255',
            'precautions' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
