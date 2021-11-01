<?php

namespace App\Http\Controllers\Api\V1;

use JWTAuth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserToken;
use App\Traits\Responses;
use App\Models\UserUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Requests\Api\Auth\SignInRequest;
use App\Http\Requests\Api\Auth\ActivateRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;


class AuthController extends Controller
{
    use Responses ; 

    // sign Up function 
    public function signUp(RegisterRequest $request)
    {
        $user = User::create($request->validated()+(['code' => 1111 , 'code_expire' => Carbon::now()->addMinute()])) ;
        // genrate new token
        $token  = JWTAuth::fromUser($user);
        // save or update device id 
        $this->updateDeviceId( $user , $request , $token );
        $this->response('success' , __('auth.registered') , ['token' => $token ] );
    }

    // activate account after register with code , token
    public function activate(ActivateRequest $request){
        // check that code is expired or not
         if(Carbon::parse(auth()->user()->code_expire)->isPast())
             $this->response('fail' , trans('auth.code_expired'));

        // check that code is same in database
        if(auth()->user()->code == $request['code']){
            auth()->user()->update(['code' => null , 'code_expire' => null , 'active' => 1]);
            $this->response('success' , __('auth.activated'), new UserResource(auth()->user()));
        }
        $this->response('fail' , trans('auth.code_invalid'));
    }

    

    // sign in fubction to auth users
    public function signIn(SignInRequest $request){
        $token = JWTAuth::attempt(['phone' => $request['phone'] , 'password' => $request['password'] ]);
        if(!$token){
            $this->response('fail' ,trans('auth.incorrect_pass_or_phone'));
        }

        // check that user is active if not active redirect to activation
        if(auth()->user()->active == false)
        {
            $code =  $this->updateCode();
            $this->response('fail' , __('auth.not_active') , ['token' => $token] );
        }

        // check that user is not blocked 
        if(auth()->user()->block == true){
            auth()->logout();
            $this->response('fail' , __('auth.blocked') );
        }
        // save or update device id 
        $this->updateDeviceId(auth()->user(), $request , $token);
        $this->response('success' ,__('apis.signed'),new UserResource(auth()->user()));
    }

    // forget password request 
    public function forgetPassword(ForgetPasswordRequest $request){
        // get user with phone number
        $user    = User::wherePhone($request->phone)->first();
        // save activation code to user updates table
        $update = UserUpdate::updateOrCreate([
            'user_id'       => $user->id,
            'type'          => 'password',
        ],[
            'code'          => 1111,
        ]);
        $this->response( 'success' ,__('auth.code_re_send')  , ['token' => JWTAuth ::fromUser( $user) ]);
    }

    // reset password after check activation code
    public function resetPassword(ResetPasswordRequest $request){

        $update = UserUpdate::where([
            'user_id'    => auth()->id() ,
            'code'       => $request->code,
            'type'       => 'password',
        ])->first();

        if (!$update){
            $this->response('fail' , __('site.code_wrong'));
        }

        auth()->user()->update(['password' => $request->password ]);
        $update->delete();
        $this->response('success' , __('apis.passwordReset'),  new UserResource(auth()->user()));
    }

    // logout function
    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $this->deleteToken(auth()->id() , $request->device_id);
            JWTAuth::invalidate($token);
            return $this->response('success',trans('apis.loggedOut'));
        } catch (JWTException $e) {
            return $this->response('fail',__('apis.something_wrong'));
        }
    }

    // delete token on logout 
    public function deleteToken($user_id , $device_id)
     {
         UserToken ::where([
             'device_id'   => $device_id,
             'user_id'     => $user_id,
         ])->delete();
         return ;
     }

     // create or update device id of user in users tokens table
     public function updateDeviceId($user , $request , $token ){
        $user->update([ 'device_id' => $request['device_id'] , 'token' => $token ]);
        UserToken::updateOrcreate( [ 
            'device_id'   => $request['device_id'] 
        ],[
            'device_type'   => $request['device_type'] ,
            'token'         => $token ,
            'user_id'       => $user->id 
        ]);
    }

    // resend activation code for user 
    public function updateCode(){
        auth()->user()->update(['code' => 1111 , 'code_expire' => Carbon::now()->addMinute()]);
        return ;
    }

    // resend code function
    public function resendCode(){
        $code = $this->updateCode();
        $this->response('success' ,__('auth.code_re_send') );
    }
}
