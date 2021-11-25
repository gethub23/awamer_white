<?php

namespace App\Http\Resources\Api;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                               => (integer) $this->id,
            'name'                             => (string)  $this->name,
            'email'                            => (string)  $this->email,
            'country_code'                     => (string)  $this->country_code,
            'phone'                            => (string)  $this->phone,
            'phoneNumber'                      => (string)  $this->fullPhoneNumber(),
            'image'                            => (string)  $this->image,
            'lang'                             => (string)  $this->lang,
            'token'                            => (string)  $this->token,
            'is_notify'                        => (boolean) $this->is_notify ,
            'device_id'                        => (string)  $this->device_id,
        ];
    }
}
