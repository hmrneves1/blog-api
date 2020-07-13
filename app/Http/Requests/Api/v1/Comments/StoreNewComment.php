<?php

namespace App\Http\Requests\Api\v1\Comments;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewComment extends FormRequest
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
            'post_id' => ['bail', 'required', 'numeric'],
            'comment' => ['bail', 'required', 'string', 'min:8'],
            'parent_id' => ['nullable', 'numeric'],
        ];
    }

    /**
     * Define costum error messages
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'post_id.required' => 'The comment should be associated to a post. Provide the post_id.',
            'post_id.numeric' => 'Error while validating the post_id.',
            'comment.required' => 'The comment cannot the empty.',
            'comment.string' => 'Error while validating the comment.',
            'comment.min' => 'The comment should be at least 10 chars long.',
            'parent_id.numeric' => 'Error while validating the parent_id from the comment.',
        ];
    }
}
