<?php

namespace App\Http\Controllers\Admin;

use DB ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\IAdmin;

class StatisticsController extends Controller
{
    protected $user  , $admin;

    public function __construct(IUser $user , IAdmin $admin)
    {
        $this->user = $user;
        $this->admin = $admin;
    }

    public function index(){
        view()->share([
            'users'     => $this->user->chartData(),
            'admins'    => $this->admin->chartData(),
        ]);
        return view('admin.statistics.index');
    }
}
