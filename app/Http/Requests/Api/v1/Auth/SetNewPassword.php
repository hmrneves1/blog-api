<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SetNewPassword extends FormRequest
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
            'email' => ['bail', 'required', 'email:rfc,dns,filter'],
            'token' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'string', 'min:8'],
            'password_confirmation' => ['bail', 'required', 'string', 'same:password', 'min:8'],
        ];
    }

    /**
     * Define custom error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'The email address is required.',
            'email.email' => 'Error while validating the email address.',
            'token.required' => 'The token is required.',
            'token.string' => 'Error while validating the token.',
            'password.required' => 'Please provide a password.',
            'password.string' => 'Error while validating the password.',
            'password.min' => 'Password should be at least 8 chars long.',
            'password_confirmation.required' => 'The password confirmation is required.',
            'password_confirmation.string' => 'Error while validating the password confirmation.',
            'password_confirmation.same' => 'The password doesn\'t match the password confirmation.',
            'password_confirmation.min' => 'Password should be at least 8 chars long.',
        ];
    }
}
