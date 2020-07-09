<?php

namespace App\Http\Requests\Api\v1\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmail extends FormRequest
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
            'email' => ['bail', 'required', 'email:rfc,dns,filter', 'unique:App\User'],
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
            'email.required' => 'The email address is required.',
            'email.email' => 'Error while validating the email.',
            'email.unique' => 'This email is already taken.',
        ];
    }
}
