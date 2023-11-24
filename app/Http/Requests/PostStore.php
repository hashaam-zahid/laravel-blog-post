<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStore extends FormRequest
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
            //
            'title' => 'min:20|max:200|required|string',
            'content' => 'min:20|max:400|required',
            'photo' => 'image|nullable|max:1999'

        ];
    }
    public function messages()
    {
        return [
        'title.required' => ' :attribute is required',
        'content.required' => ' :attribute is required',
        'photo.image' => ' :attribute is required'
        ];
    }
}
