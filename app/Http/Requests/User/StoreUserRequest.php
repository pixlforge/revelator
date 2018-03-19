<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:45',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:dev,admin,user'
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

            'email.required' => 'An email address is required.',
            'email.email' => 'Email address must match the pattern address@provider.tld.',
            'email.unique' => 'This email address is already in use.',
            'email.max' => 'Maximum 255 characters.',

            'password.required' => 'A password is required.',
            'password.string' => 'The password should be a character string.',
            'password.min' => 'Minimum 6 characters.',
            'password.confirmed' => 'Passwords must match.',

            'role.required' => 'A role is required.',
            'role.in' => 'Select a role among those suggested.'
        ];
    }
}
