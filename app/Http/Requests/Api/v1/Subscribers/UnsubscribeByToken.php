<?php

namespace App\Http\Requests\Api\v1\Subscribers;

use Illuminate\Foundation\Http\FormRequest;

class UnsubscribeByToken extends FormRequest
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
            'token' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'email:rfc,dns,filter'],
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
            'token.required' => 'Invalid token.',
            'token.string' => 'Invalid token.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Error while validating the email.',
        ];
    }
}
