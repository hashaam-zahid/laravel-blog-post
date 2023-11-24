<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'min:3|max:15|required|bail',
            'email'=>'email|required',
            'phone'=>'required|regex:/(92)[0-9]{10}/',
            'message'=>'required|max:400'
        ];
    }
    public function messages()
    {
        return [
        'name.required'=>':attribute is Required',
        'email.email'=>':attribute is Required',
        'message.required'=>':attribute is required'
     ];
    }
}
