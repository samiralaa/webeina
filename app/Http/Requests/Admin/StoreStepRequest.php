<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepRequest extends FormRequest
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
            'title.ar' => 'nullable|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'description.ar' => 'nullable|string',
            'description.en' => 'nullable|string',
            'service_id' => 'nullable|exists:services,id',
        ];
    }
}
