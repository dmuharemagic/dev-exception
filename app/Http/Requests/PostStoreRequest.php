<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'  => 'required|string|min:3|max:100',
            'link' => 'nullable|string',
            'image' => 'nullable|string',
            'body' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please fill out the title input.',
            'body.required' => 'Please fill out the content of the post.'
        ];
    }
}
