<?php

namespace App\Http\Requests\Api\v1\Administration\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserGroup extends FormRequest
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
            'group_id' => ['bail', 'required', 'numeric'],
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
            'user_id.required' => 'Error while validating the user ID.',
            'user_id.numeric' => 'User ID must be numeric.',
            'group_id.required' => 'Error while validating the group ID.',
            'group_id.numeric' => 'Group ID must be numeric.',
        ];
    }
}
