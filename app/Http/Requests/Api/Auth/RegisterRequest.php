<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends BaseApiRequest
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
            'name'           => 'required',
            'phone'          => 'required|numeric|min:10|unique:users,phone',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required',
            'device_id'      => 'required',
            'avatar'         => 'nullable',
        ];
    }
}
