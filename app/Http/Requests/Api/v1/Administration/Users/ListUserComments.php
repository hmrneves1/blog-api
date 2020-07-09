<?php

namespace App\Http\Requests\Api\v1\Administration\Users;

use Illuminate\Foundation\Http\FormRequest;

class ListUserComments extends FormRequest
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
            'limit' => ['bail', 'required', 'numeric'],
            'order_by' => ['bail', 'required', 'in:asc,desc'],
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
            'limit.required' => 'Error while validating the query limit.',
            'limit.numeric' => 'Query limit must be numeric.',
            'order_by.required' => 'Specify the query order.',
            'order_by.in' => 'The order by should be asc or desc.',
        ];
    }
}
