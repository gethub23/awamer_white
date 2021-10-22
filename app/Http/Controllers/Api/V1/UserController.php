<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\NotificationsResource;
use App\Http\Requests\Api\User\EditProfileRequest;
use App\Http\Requests\Api\User\updatePhoneRequest;
use App\Http\Requests\Api\User\EditPasswordRequest;
use App\Http\Requests\Api\User\checkUpdatePhoneCodeRequest;

class UserController extends Controller
{
    use     Responses;

    private $Repo;

    public function __construct(IUser $Repo)
    {
        $this->Repo          =   $Repo;
    }

    // profile data 
    public function profile(){
        $this->response('success','',new UserResource(auth()->user()));
    }

    // change phone request with send activation code
    public function updatePhoneRequest(updatePhoneRequest $request)
    {
        $code =   $this->Repo->updatePhoneRequest($request->validated());
        return $this->response('success' , trans('apis.send_activated'));
    }

    // check actiovation code and change phone 
    public function checkUpdatePhoneCode(checkUpdatePhoneCodeRequest $request)
    {
        $this->Repo->checkUpdatePhoneCode($request->code);
    }
    // edit password for auth user
    public function EditPassword(EditPasswordRequest $request)
    {
        $this->Repo->editPassword($request->validated());
    }

    // change notify status
    public function changeNotifyStatue()
    {
        $user = auth()->user() ; 
        $user->update(['is_notify' => $user->is_notify == 1 ? 0 : 1 ]);
        $msg = $user->is_notify ? __('apis.openNotify') : __('apis.closeNotify') ;
        $this->response('success', $msg, ['status' => $user->is_notify]);
    }
    // notifications 
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

    // update profile 
    public function updateProfile(EditProfileRequest $request){
        auth()->user()->update($request->validated());
        $this->response('succesdd' ,__('apis.updated'),new UserResource(auth()->user()) );
    }
}
