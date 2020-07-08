<?php

namespace App\Http\Requests\Api\v1\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewCategory extends FormRequest
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
            'name' => ['bail', 'required', 'string'],
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
            'name.bail' => 'Please provide the category name.',
            'name.required' => 'Please provide the category name.',
            'name.string' => 'Error validating the category name.',
        ];
    }
}
