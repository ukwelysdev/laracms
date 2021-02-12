<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkWithPage extends FormRequest
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
            'title'=>'required',
            'url'=>'required',
            'content'=>'required|max:400'
            //
        ];

    }

    public function messages(){
        return [
            'title.required'=>'A Title must be entered',
            'url.required'=>'Enter valid URL',
            'content.required'=>'Please Enter some content',
            'content.max'=>'Do not go beyond 2 characters in THE CONTENT '
        ];
    }

    }

