<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use App\Models\UserUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\NotificationsResource;
use App\Http\Requests\Api\User\EditProfileRequest;
use App\Http\Requests\Api\User\updatePhoneRequest;
use App\Http\Requests\Api\User\EditPasswordRequest;
use App\Http\Requests\Api\User\checkUpdatePhoneCodeRequest;

class UserController extends Controller
{
    use     Responses;

    // profile data 
    public function profile(){
        $this->response('success','',new UserResource(auth()->user()));
    }

    // change phone request with send activation code
    public function updatePhoneRequest(updatePhoneRequest $request)
    {
        $update = UserUpdate::updateOrCreate([
            'user_id'       => auth()->id(),
            'type'          => 'phone',
        ],[
            'code'          => 1111,
            'phone'         => $request->phone,
        ]); 

        return $this->response('success' , trans('apis.send_activated'));
    }

    // check actiovation code and change phone 
    public function checkUpdatePhoneCode(checkUpdatePhoneCodeRequest $request)
    {
        $update = UserUpdate::where([
            'user_id'    => auth()->id() ,
            'code'       => $request->code,
            'type'       => 'phone',
        ])->first();

        if (!$update){
            $this->response('fail' , __('site.code_wrong'));
        }

        auth()->user()->update(['phone' => $update->phone ]);
        $update->delete();

        $this->response('success' , __('apis.phone_changed'),  new UserResource(auth()->user()));
    }
    // edit password for auth user
    public function EditPassword(EditPasswordRequest $request)
    {
        if (!\Hash::check($request['old_password'], auth()->user()->password))
            $this->response('fail',trans('auth.incorrect_pass'));
            
        auth()->user()->update(['password' => $request['password'] ]);
        $this->response('success',trans('auth.password_changed'));
    }

    // CHANGE NOTIFY STATUS
    public function changeNotifyStatue()
    {
        $user = auth()->user() ; 
        $user->update(['is_notify' => !$user->is_notify  ]);
        $msg = $user->is_notify ? __('apis.openNotify') : __('apis.closeNotify') ;
        $this->response('success', $msg, ['status' => $user->is_notify]);
    }
    // NOTIFICATIONS 
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->response('success' , '' ,NotificationsResource::collection(auth()->user()->notifications));
    }
    // COUNT NOTIFICATIONS
    public function countNotifications()
    {
        $this->response('success' , '' ,['count' => auth()->user()->unreadNotifications->count()] , '');
    }
    // DELETE NOTIFICATIONS
    public function deleteNotifications(Request $request)
    {
        auth()->user()->notifications()->where('id', $request->id)->first()->delete();
        $this->response( 'success' , '' , __('site.notify_deleted'));
    }

    // UPDATE PROFILE 
    public function updateProfile(EditProfileRequest $request){
        auth()->user()->update($request->validated());
        $this->response('success' ,__('apis.updated'),new UserResource(auth()->user()) );
    }
}
