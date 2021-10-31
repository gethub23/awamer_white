<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Controllers\Controller;
use Image ;
class SettingController extends Controller
{
    /***************************  get all settings  **************************/
    public function index(){
        $data =  SettingService::appInformations(SiteSetting::pluck('value', 'key'));
        return view('admin.settings.index',compact('data'));
    }


    /***************************  update settings  **************************/
    public function update(Request $request){

        foreach ( $request->all() as $key => $val )
            if (in_array($key , ['logo' , 'fav_icon' , 'user_default'])) {
                $img           = Image::make($val);
                $name          = $key .'.png';

                if ($key == 'logo' || $key == 'fav_icon') {
                    $thumbsPath    = 'storage/images/settings';
                } else if($key == 'default_user'){
                    $thumbsPath    = 'storage/images/users';
                }else if ($key == 'no_data') {
                    $thumbsPath    = 'storage/images/';
                }
                
                $img->save($thumbsPath . '/' . $name);
            }else if($val){
                SiteSetting::where( 'key', $key ) -> update( [ 'value' => $val ] );
            }

        return back()->with('success','تم الحفظ');
    }


    /***************************  message all  **************************/
    public function messageAll(Request $request,$type){

        $this->userRepo->messageAll($request->all(),$type);
        return back()->with('success','تم الارسال');
    }

    /***************************  message one  **************************/
    public function messageOne(Request $request,$type){

        $this->userRepo->messageOne($request->all(),$type);
        return back()->with('success','تم الارسال');
    }

    /***************************  send email  **************************/
    public function sendEmail(Request $request){

        $this->settingRepo->sendEmail($request->all());
        return back()->with('success','تم الارسال');
    }
}
