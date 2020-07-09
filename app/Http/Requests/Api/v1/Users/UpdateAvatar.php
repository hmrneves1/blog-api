<?php

namespace App\Http\Requests\Api\v1\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatar extends FormRequest
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
            'avatar' => ['bail', 'required', 'mimes:jpeg,png,gif', 'max:2048'],
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
            'user_id.required' => 'Error while validating the user ID.',
            'user_id.numeric' => 'Error while validating the user ID.',
            'avatar.required' => 'Insert an avatar.',
            'avatar.mimes' => 'The allowed avatar extensions are: jpeg, png e gif.',
            'avatar.max' => 'The avatar maximum size is 2MB.',
        ];
    }
}
