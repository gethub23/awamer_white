<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UploadTrait;
 
    protected $guarded      = ['id'];

    protected $hidden       = [
        'password', 'remember_token',
    ];

    protected $fillable     = ['name','phone','email','password','avatar','device_id','code','token',
        'code_expire','active','latitude','longitude','address','is_notify','key','block'];



    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/users/'.$value);
    }

    public function setAvatarAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['avatar'] = $this->uploadAllTyps($value, 'users' , 100 , 100);
        }
    }

    public function setPasswordAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function devices(){
        return $this->hasMany(UserToken::class);
    }

}
