<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
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
            'password' => ['bail', 'required', 'string'],
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
            'email.required' => 'The email address is required.',
            'email.email' => 'Error while validating the email address.',
            'password.required' => 'The password is required.',
            'password.string' => 'Error while validating the password',
        ];
    }
}
