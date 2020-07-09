<?php

namespace App\Http\Requests\Api\v1\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
            'user_id' => ['bail', 'required', 'numeric'],
            'password' => ['bail', 'required', 'string'],
            'password_confirmation' => ['bail', 'required', 'string', 'same:password'],
        ];
    }

    /**
     * Defines custom error messages
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Error while validating the user ID.',
            'user_id.numeric' => 'Error while validating the user ID.',
            'password.required' => 'Please provide a password.',
            'password.string' => 'Error while validating the password.',
            'password_confirmation.required' => 'The password confirmation is required.',
            'password_confirmation.string' => 'Error while validating the password confirmation.',
            'password_confirmation.same' => 'The password doesn\'t match the password confirmation.',
        ];
    }
}
