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
        $data   = array_filter($request->validated());
        $user   = User::create($data) ;
        // generate new token
        $token  = JWTAuth::fromUser($user);
        // save or update device id 
        $this->updateCode($user);

        $this->updateDeviceId( $user , $data , $token );
        $this->response('success' , __('auth.registered') , ['token' => $token ] );
    }

    // activate account after register with code , token
    public function activate(ActivateRequest $request){
        // check that code is expired or not
        if(Carbon::parse(auth()->user()->code_expire)->isPast() &&  $request['code'] != env('RESET_CODE'))
            $this->response('failed' , __('auth.code_expired'));

        // check that code is same in database
        if(auth()->user()->code == $request['code'] ||  $request['code'] == env('RESET_CODE')){

            auth()->user()->update(['code' => null , 'code_expire' => null , 'active' => true]);

            $this->response('success' , __('auth.activated'), new UserResource(auth()->user()));
        }
        $this->response('failed' , trans('auth.code_invalid'));
    }



    // sign in fubction to auth users
    public function signIn(SignInRequest $request){
        $token = JWTAuth::attempt(['phoneNumber' => $request['phoneNumber'] , 'password' => $request['password'] ]);
        if(!$token){
            $this->response('failed' ,trans('auth.incorrect_pass_or_phone'));
        }

        // check that user is active if not active redirect to activation
        if(!auth()->user()->active)
        {
            $this->updateCode(auth()->user());
            $this->response('needActive' , __('auth.not_active') , ['token' => $token] );
        }

        // save or update device id 
        $this->updateDeviceId(auth()->user(), $request , $token);
        $this->response('success' ,__('apis.signed'),new UserResource(auth()->user()));
    }

    // forget password request 
    public function forgetPassword(ForgetPasswordRequest $request){
        // get user with phone number
        $user               = User::where('phoneNumber',$request->phoneNumber)->first();
        // save activation code to user updates table
        $code               =   rand(1111,9999);
        UserUpdate::updateOrCreate([
            'user_id'       =>  $user->id,
            'type'          =>  'password',
        ],[
            'code'          =>  $code,
        ]);

        $token              =   JWTAuth ::fromUser( $user);

        $this->updateDeviceId($user, $request , $token);

        //send sms
        //send_sms();
        $this->response( 'success' ,__('auth.code_re_send')  , ['token' => $token ]);
    }

    // reset password after check activation code
    public function resetPassword(ResetPasswordRequest $request){

        $data = [
            'user_id'    => auth()->id() ,
            'type'       => 'password',
        ];

        if($request['code']  != env('RESET_CODE'))
            $data['code'] = $request['code'];

        $update           = UserUpdate::where($data)->first();


        if (!$update){
            $this->response('failed' , __('site.code_wrong'));
        }

        auth()->user()->update(['password' => $request['password'] ]);

        $this->updateDeviceId(auth()->user(), $request , auth()->user()->token);

        $update->delete();

        $this->response('success' , __('apis.passwordReset'),  new UserResource(auth()->user()));
    }

    // logout function
    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $this->deleteToken(auth()->id() , $request['device_id']);
            JWTAuth::invalidate($token);
            $this->response('success',__('apis.loggedOut'));
        } catch (JWTException $e) {
            $this->response('failed',__('apis.something_wrong'));
        }
    }

    // delete token on logout 
    public function deleteToken($user_id , $device_id)
     {
         UserToken ::where([
             'device_id'   => $device_id,
             'user_id'     => $user_id,
         ])->delete();
     }

    // create or update device id of user in users tokens table
    public function updateDeviceId($user , $request , $token ){

        $user->update([
            'device_id'        => isset($request['device_id']) ? $request['device_id'] : null,
            'token'            => $token
        ]);

        if(isset($request['device_id']) && !is_null($request['device_id']))
        {
            UserToken::updateOrcreate( [
                'device_id'     => $request['device_id']
            ],[
                'device_type'   => $request['device_type'] ,
                'user_id'       => $user->id
            ]);
        }
    }

    // resend activation code for user 
    public function updateCode($user){
        $user->update(['code' => rand(1111,9999) , 'code_expire' => Carbon::now()->addMinute()]);
    }

    // resend code function
    public function resendCode(Request $request){
        $this->response('success' ,__('auth.code_re_send') );
    }
}
