<?php

namespace App\Http\Controllers\Api\V1;

use JWTAuth;
use Carbon\Carbon;
use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Http\Resources\Api\UserResource;
use App\Http\Requests\Api\Auth\SignInRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ActivateRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;


class AuthController extends Controller
{
    use     Responses;

    private $userRepository;
    public function __construct(IUser $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // sign Up function 
    public function signUp(RegisterRequest $request)
    {
        $user   = $this->userRepository->signUp($request->validated());
        $token  = JWTAuth::fromUser($user);
        $user->update(['token' => $token]);
        $this->response('success' , __('auth.registered') , ['token' => $token ] );
    }

    // activate account after register with code , token
    public function activate(ActivateRequest $request){
        // check that code is expired or not
         if(Carbon::parse(auth()->user()->code_expire)->isPast())
             $this->response('fail' ,trans('auth.code_expired'));

        // check that code is same in database
        if(auth()->user()->code == $request['code']){
            $this->userRepository->activateUser(auth()->user());
            $this->response('success', __('auth.activated'), new UserResource(auth()->user()));
        }
        $this->response('fail',trans('auth.code_invalid'));
    }

    // resend code function
    public function resendCode(){
        $code = $this->userRepository->updateCode(auth()->user());
        $this->response('success' ,__('auth.code_re_send') );
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
            $code =  $this->userRepository->updateCode(auth()->user());
            $this->response('fail' , __('auth.not_active') , ['token' => $token] );
        }
        // check that user is not blocked 
        if(auth()->user()->block == true){
            auth()->logout();
            $this->response('fail' , __('auth.blocked') );
        }

        $this->userRepository->updateDeviceId(auth()->user(), $request);
        $this->response('success' ,__('apis.signed'),new UserResource(auth()->user()));
    }

    // forget password request 
    public function forgetPassword(ForgetPasswordRequest $request){
        $data  = $this->userRepository->forgetPassword($request->phone);
    }

    // reset password after check activation code
    public function resetPassword(ResetPasswordRequest $request){
        $this->userRepository->checkForgetPasswordCode($request->validated());
    }

    // logout function
    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $this->userRepository->deleteToken(auth()->id() , $request->device_id);
            JWTAuth::invalidate($token);
            return $this->response('success',trans('apis.loggedOut'));
        } catch (JWTException $e) {
            return $this->response('fail',__('apis.something_wrong'));
        }
    }
}
