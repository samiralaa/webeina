<?php

namespace App\Http\Requests\Web\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            // 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
            'description.en' => 'required|string|max:500',
            'description.ar' => 'required|string|max:500',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'image_banar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8034',
        ];
    }
}
