<?php

namespace App\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'code' => 'nullable|string|min:3|max:45',
            'slogan' => 'nullable|string|min:3|max:255',
            'description' => 'nullable|string|min:5|max:3000',
            'url' => 'required|url|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required.',
            'title.string' => 'The title should be a character string.',
            'title.min' => 'Minimum 3 characters.',
            'title.max' => 'Maximum 255 characters.',

            'code.string' => 'The code should be a character string.',
            'code.min' => 'Minimum 3 characters.',
            'code.max' => 'Maximum 45 characters.',

            'slogan.string' => 'The slogan should be a character string.',
            'slogan.min' => 'Minimum 3 characters.',
            'slogan.max' => 'Maximum 45 characters.',

            'description.string' => 'The description should be a character string.',
            'description.min' => 'Minimum 5 characters.',
            'description.max' => 'Maximum 3000 characters.',

            'url.required' => 'The URL related to the program is required.',
            'url.url' => 'The URL should be a valid URL.',
            'url.max' => "Maximum 255 characters."
        ];
    }
}
