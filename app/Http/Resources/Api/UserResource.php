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
            'id'                               => (int)     $this->id,
            'name'                             => (string)  $this->name,
            'email'                            => (string)  $this->email,
            'phone'                            => (string)  $this->phone,
            'avatar'                           => (string)  $this->avatar,
            'block'                            => (boolean) $this->block,
            'active'                           => (boolean) $this->active,
            'lang'                             => (string)  $this->lang,
            'token'                            => (string)  $this->token,
            'is_notify'                        => (string) $this->is_notify ,
            'device_id'                        => (string) $this->device_id,
        ];
    }
}
