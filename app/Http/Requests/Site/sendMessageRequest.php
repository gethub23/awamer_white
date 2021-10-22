<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class sendMessageRequest extends FormRequest
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
            'name'      => 'required|max:20' , 
            'email'     => 'required|email' , 
            'phone'     => 'required|numeric' , 
            'message'   => 'required|max:250' , 
        ];
    }
}
