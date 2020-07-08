<?php

namespace App\Http\Requests\Api\v1\Subscribers;

use Illuminate\Foundation\Http\FormRequest;

class NewSubscriber extends FormRequest
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
            'user_id' => ['nullable', 'numeric'],
            'name' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'email:rfc,dns,filter', 'unique:App\Models\Api\v1\Subscribers\Subscribers'],
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
            'user_id.numeric' => 'Error while validating the user ID.',
            'name.required' => 'The name is required.',
            'name.string' => 'Error while validating the name.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Error while validating the email.',
            'email.unique' => 'This email is already on our subscribers list.',
        ];
    }
}
