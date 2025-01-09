<?php

namespace App\Http\Requests\Content;

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
            'service_id' => 'nullable|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'questions' => 'nullable|array|min:1',  // Ensure questions is an array and contains at least one item
            'questions.*.question' => 'nullable|array',  // Ensure 'question' is an array
            'questions.*.question.en' => 'nullable|string|max:255',  // Ensure English question is a string of max length 255
            'questions.*.question.ar' => 'nullable|string|max:255',  // Ensure Arabic question is a string of max length 255
            'questions.*.answer' => 'nullable|array',  // Ensure 'answer' is an array
            'questions.*.answer.en' => 'nullable|string|max:255',  // Ensure English answer is a string of max length 255
            'questions.*.answer.ar' => 'nullable|string|max:255',  // Ensure Arabic answer is a string of max length 255
            'questions.*.color' => 'nullable|string|max:7',  // Ensure color is a string (e.g., hex color code)
            'color' => 'nullable|string',
            'type' => 'required',
            'link' => 'nullable|string',
            'sub_title.ar' => 'nullable|string|max:255',
            'sub_title.en' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
