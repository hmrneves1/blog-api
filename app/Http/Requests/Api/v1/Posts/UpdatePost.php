<?php

namespace App\Http\Requests\Api\v1\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title' => ['nullable', 'string', 'min:1'],
            'body' => ['nullable', 'string', 'min:1'],
            'image' => ['nullable', 'mimes:jpeg,png,gif', 'max:3072'],
        ];
    }

    /**
     * Defines the custom error messages for validations.
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.string' => 'Error while validating the title.',
            'title.min' => 'The title should be at least 10 characters long.',
            'body.string' => 'Error while validating the post content.',
            'body.min' => 'The post content should be at least characters long.',
            'image.mimes' => 'The supported image extensions are jpg, png and gif.',
            'image.max' => 'The image maximum size is 3MB',
        ];
    }
}
