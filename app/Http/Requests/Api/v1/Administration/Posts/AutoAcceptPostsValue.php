<?php

namespace App\Http\Requests\Api\v1\Administration\Posts;

use Illuminate\Foundation\Http\FormRequest;

class AutoAcceptPostsValue extends FormRequest
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
            'min_posts' => ['bail', 'required', 'numeric'],
        ];
    }

    /**
     * Define the custom error messages
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'min_posts.required' => 'Please provide the new value.',
            'min_posts.numeric' => 'Error while validating the new value.',
        ];
    }
}
