<?php

namespace App\Http\Requests\Guest;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestRequest extends FormRequest
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
            'firstName' => 'required|string|min:2|max:255',
            'lastName' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255'
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
            'firstName.required' => 'A first name is required.',
            'firstName.string' => 'The first name should be a character string.',
            'firstName.min' => 'Minimum 2 characters.',
            'firstName.max' => 'Maximum 255 characters.',

            'lastName.required' => 'A last name is required.',
            'lastName.string' => 'The last name should be a character string.',
            'lastName.min' => 'Minimum 2 characters.',
            'lastName.max' => 'Maximum 255 characters.',

            'email.required' => 'An email address is required.',
            'email.email' => 'Email address must match the pattern address@provided.tld.',
            'email.max' => 'Maximum 255 characters.'
        ];
    }
}
