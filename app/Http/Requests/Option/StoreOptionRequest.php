<?php

namespace App\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'pos' => 'nullable|numeric|between:0,999',
            'question_id' => 'required|exists:questions,id'
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
            'name.min' => 'Minimum 2 characters.',
            'name.max' => 'Maximum 255 characters.',

            'pos.required' => 'A position is required.',
            'pos.numeric' => 'The position must be a numeric value.',
            'pos.between' => 'Value should be between 0 and 999',

            'question_id.required' => 'A question is required.',
            'question_id.exists' => 'Select a question among those suggested.',
        ];
    }
}
