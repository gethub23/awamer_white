<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed country_code
 * @property mixed phone
 */
class ForgetPasswordRequest extends BaseApiRequest
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
            'country_code'    => 'required',
            'phone'           => 'required|min:10|numeric|exists:users,phone',
            'phoneNumber'     => 'required|exists:users,phoneNumber',
            'device_type'     => 'required',
            'device_id'       => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['phoneNumber'=>$this->country_code . ltrim($this->phone,'0')]);
    }
}
