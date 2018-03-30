<?php

namespace App\Http\Requests\Guest;

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
            'user_consents' => 'required|boolean',
            'first_name' => 'required_if:user_consents,true|string|min:2|max:255',
            'last_name' => 'required_if:user_consents,true|string|min:2|max:255',
            'guest_email' => 'required_if:user_consents,true|email|max:255'
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
            'user_consents.required' => 'The consent is required.',
            'user_consents.boolean' => 'The consent must be of type boolean.',

            'first_name.required_if' => 'A first name is required when consenting to share personal infos.',
            'first_name.string' => 'The first name should be a character string.',
            'first_name.min' => 'Minimum 2 characters.',
            'first_name.max' => 'Maximum 255 characters.',

            'last_name.required' => 'A last name is required when consenting to share personal infos.',
            'last_name.string' => 'The last name should be a character string.',
            'last_name.min' => 'Minimum 2 characters.',
            'last_name.max' => 'Maximum 255 characters.',

            'guest_email.required' => 'An email address is required when consenting to share personal infos.',
            'guest_email.email' => 'Email address must match the pattern address@provider.tld.',
            'guest_email.max' => 'Maximum 255 characters.'
        ];
    }
}
