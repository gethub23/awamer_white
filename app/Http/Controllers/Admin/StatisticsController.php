<?php

namespace App\Http\Controllers\Admin;

use DB ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index(){
        // view()->share([
        //     'users'     => $this->user->chartData(),
        //     'admins'    => $this->admin->chartData(),
        // ]);
        return view('admin.statistics.index');
    }
}
