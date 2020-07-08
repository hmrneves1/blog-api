<?php

namespace App\Http\Requests\Api\v1\Comments;

use Illuminate\Foundation\Http\FormRequest;

class EditComment extends FormRequest
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
            'comment' => ['bail', 'required', 'string'],
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
            'comment.required' => 'The comment cannot the empty.',
            'comment.string' => 'Error while validating the comment.',
        ];
    }
}

