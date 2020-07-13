<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => ['bail', 'required', 'string'],
            'user_name' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'string', 'min:8'],
            'password_confirm' => ['bail', 'required', 'string', 'same:password', 'min:8'],
            'email' => ['bail', 'required', 'email:rfc,dns,filter', 'unique:App\User'],
        ];
    }

    /**
     * Define custom error messages
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Your real name is required.',
            'name.string' => 'Error while validating your real name.',
            'user_name.required' => 'Type you personal user_name.',
            'user_name.string' => 'Error while validating the user_name.',
            'password.required' => 'The password is required.',
            'password.string' => 'Error while validating the password.',
            'password.min' => 'The password should be at least 8 chars long.',
            'password_confirm.required' => 'The password confirmation is required.',
            'password_confirm.string' => 'Error while validating the password confirmation.',
            'password_confirm.same' => 'The password and password confirm must match.',
            'password_confirm.min' => 'The password confirmation should be at least 8 chars long.',
            'email.required' => 'The e-mail address is required.',
            'email.email' => 'Error while validating the e-mail address.',
            'email.unique' => 'The email has already been taken.',
        ];
    }
}
