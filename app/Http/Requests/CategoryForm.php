<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryForm extends FormRequest
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
            'category_name' => 'required | alpha|unique:categories,category_name',
            'category_description' => 'required',
        ];
    }

    //nije hate banano function
    public function messages()
    {
        return [
            'category_name.required'=>'category nam koy?',
            'category_description.required'=>'description nam koy?',
        ];
    }
}
