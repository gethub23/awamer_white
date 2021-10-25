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
        $activeUsers = User::where(['active' => true])->count() ; 
        $notActiveUsers = User::where(['active' => false])->count() ; 
        $menus = $this->home() ;
        $colores = ['info' , 'danger' , 'warning' , 'success' , 'primary'];
        
        return view('admin.dashboard.index' , compact('menus' ,'colores' , 'activeUsers' , 'notActiveUsers'));
    }
}
