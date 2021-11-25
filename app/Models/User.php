<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property mixed country_code
 * @property mixed phone
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UploadTrait;
 
    protected $guarded      = ['id'];

    protected $hidden       = [
        'password', 'remember_token',
    ];

    protected $fillable     = ['name','phone','email','password','image','device_id','code','token','phoneNumber',
        'code_expire','active','latitude','approved','longitude','address','is_notify','country_code','block'];



    public function fullPhoneNumber(){
       return $this->country_code . ltrim($this->phone,'0');
    }

    public function getImageAttribute($value)
    {
        return asset('/storage/images/users/'.$value);
    }

    public function setImageAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['image'] = $this->uploadAllTyps($value, 'users' , 100 , 100);
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
