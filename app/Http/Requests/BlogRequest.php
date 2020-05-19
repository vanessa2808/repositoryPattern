<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [

            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'writer' => 'required',

        ];
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'please enter title',
            'description.required' => 'please enter description',
            'image.required' => 'please upload your image',
            'writer.required' => 'please enter writer',



        ];
    }
}
