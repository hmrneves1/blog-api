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
            'title' => ['required', 'string', 'min:10'],
            'body' => ['required', 'string', 'min:20'],
            'image' => ['nullable', 'mimes:jpeg,png,gif', 'max:3072'],
            'categories' => ['required'],
            'categories.*' => ['numeric'],
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
            'title.required' => 'Please provide a title.',
            'title.string' => 'Error while validating the title.',
            'title.min' => 'The title should be at least 10 characters long.',
            'body.required' => 'Please write the post content.',
            'body.string' => 'Error while validating the post content.',
            'body.min' => 'The post content should be at least characters long.',
            'image.mimes' => 'The supported image extensions are jpg, png and gif.',
            'image.max' => 'The image maximum size is 3MB',
            'categories.required' => 'Select at least 1 category.',
            'catgories.*.numeric' => 'Error while validating the categories.',
        ];
    }
}
