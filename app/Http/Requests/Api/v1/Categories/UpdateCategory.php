<?php

namespace App\Http\Requests\Api\v1\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'name' => ['required', 'string'],
        ];
    }

    /**
     * Defines the custom error messages.
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'name.string' => 'Error validating the category name.',
        ];
    }
}
