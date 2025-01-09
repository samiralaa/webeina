<?php

namespace App\Http\Requests\Content\ContectHome;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'link' => 'nullable|url',
            'type' => 'required|string',
            'status' => 'required|boolean',
            'link_text.ar' => 'nullable|string|max:255',
            'link_text.en' => 'nullable|string|max:255',
            'bottom_text.ar' => 'nullable|string|max:255',
            'bottom_text.en' => 'nullable|string|max:255',
            'subtitle.ar' => 'nullable',
            'subtitle.en' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'slider_name.ar' => 'nullable|array',
            'slider_name.en' => 'nullable|array',
            'slider_name.ar.*' => 'nullable|string|max:255',
            'slider_name.en.*' => 'nullable|string|max:255',
            'slider_link.ar' => 'nullable|array',
            'slider_link.en' => 'nullable|array',
            'slider_link.ar.*' => 'nullable|url',
            'slider_link.en.*' => 'nullable|url',
            'info_name' => 'nullable|array',
            'info_name.*.en' => 'nullable|string',
            'info_name.*.ar' => 'nullable|string',
            'info_value' => 'nullable|array',
            'info_value.*.en' => 'nullable|string',
            'info_value.*.ar' => 'nullable|string',
            //


        ];
    }
}
