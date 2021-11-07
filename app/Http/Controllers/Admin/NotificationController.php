<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\Notify;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index(Type $var = null)
    {
       return view('admin.notifications.index');
    }


    public function sendNotifications(Request $request)
    {
        if ($request->user_type == 'all_users' ) {
            $rows = User::with(['devices'])->get() ; 
        }else if($request->user_type == 'active_users'){
            $rows = User::with('devices')->where('active' , true)->get() ; 
        }else if($request->user_type == 'not_active_users'){
            $rows = User::with('devices')->where('active' , false)->get() ; 
        }else if($request->user_type == 'blocked_users'){
            $rows = User::with('devices')->where('block' , true)->get() ; 
        }else if($request->user_type == 'not_blocked_users'){
            $rows = User::with('devices')->where('block' , flase)->get() ; 
        }else if($request->user_type == 'admins'){
            $rows = Admin::get() ; 
        }
        // dd($rows);

        dispatch(new Notify($rows, $request));
        
    }
}
