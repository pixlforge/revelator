<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'type' => 'required|in:dropdown,multiple,multiple-inline,infos',
            'pos' => 'required|numeric|between:0,999'
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
            'name.required' => 'A name is required.',
            'name.string' => 'The name should be a character string.',
            'name.min' => 'Minimum 3 characters.',
            'name.max' => 'Maximum 255 characters.',

            'type.required' => 'A type is required.',
            'type.in' => 'Select a type among those suggested.',

            'pos.required' => 'A position is required.',
            'pos.numeric' => 'The position must be a numeric value.',
            'pos.between' => 'Value should be between 0 and 999'
        ];
    }
}
