<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed country_code
 * @property mixed phone
 */
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
            'country_code'   => 'required',
            'phone'          => 'required|numeric|min:10|unique:users,phone',
            'phoneNumber'    => 'required|unique:users,phoneNumber',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required',
            'device_id'      => 'nullable',
            'device_type'    => 'nullable',
            'image'          => 'nullable',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['phoneNumber'=>$this->country_code . ltrim($this->phone,'0')]);
    }



}
