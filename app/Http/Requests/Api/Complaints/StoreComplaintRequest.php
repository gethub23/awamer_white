<?php

namespace App\Http\Requests\Api\Complaints;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends BaseApiRequest
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
            'user_name'  => 'required' , 
            'phone'      => 'required' , 
            'complaint'  => 'required' , 
        ];
    }
}
