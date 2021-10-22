<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use Menu ;
    /***************** dashboard *****************/
    public function dashboard()
    {
        $menus = $this->home() ;
        return view('admin.dashboard.index' , compact('menus'));
    }
}
