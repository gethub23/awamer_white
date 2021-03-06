<?php

namespace App\Http\Requests\Admin\coupons;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->getMethod() === 'PUT'){
            $rules = [
<<<<<<< HEAD
                'identity'              => 'required|unique:coupons,identity',
=======
                'identity'              => 'required|unique:coupons,identity,'.$this->id,
>>>>>>> 3d480589c79498d9ad2c3259be9051a40152d281
                'usage'                 => 'required|numeric',
                'discount'              => 'required|numeric',
                'max_discount'          => 'required|numeric',
                'expire_date'           => 'required|after_or_equal:today',
                'type'                  => 'required|in:ratio,number',
            ];
            return $rules;
        }else{
            $rules = [
                'identity'              => 'required|unique:coupons,identity',
                'usage'                 => 'required|numeric',
                'discount'              => 'required|numeric',
                'max_discount'          => 'required|numeric',
                'expire_date'           => 'required|after_or_equal:today',
                'type'                  => 'required|in:ratio,number',
            ];
            return $rules;
        }
    }
}
