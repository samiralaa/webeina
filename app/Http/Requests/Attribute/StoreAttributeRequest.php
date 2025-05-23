<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
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
            'key.en' => 'required|string',
            'key.ar' => 'required|string',
            'attributable_type' => 'required|string',
            'field_type' => 'required|string',
            'is_required' => 'required|boolean',
            'show_in_table' => 'required|boolean',
            'options' => 'nullable|array',
        ];
    }
}
