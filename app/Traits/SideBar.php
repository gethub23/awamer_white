<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;
use App\Models\Permission;

trait  SideBar
{
    
    // display routes
    static function sidebar()
    {
        $routes         = Route::getRoutes();
        $routes_data    = [];
        $html = '' ;
        $my_routes      = Permission::where('role_id', auth()->guard('admin')->user()->role_id)->pluck('permission')->toArray();
        foreach ($routes as $route) {
            if ($route->getName())
                $routes_data['"'.$route->getName().'"'] = [
                    'title'     => isset($route->getAction()['title']) ? $route->getAction()['title'] : null,
                    'subTitle'  => isset($route->getAction()['subTitle']) ? $route->getAction()['subTitle'] : null,
                    'icon'      => isset($route->getAction()['icon']) ? $route->getAction()['icon'] : null,
                    'subIcon'   => isset($route->getAction()['subIcon']) ? $route->getAction()['subIcon'] : null,
                    'name'      => $route->getName() ?? null,
                ];
        }


        foreach ($routes as $value) {
            if ($value->getName() !== null) {

                //display only parent routes
                if (isset($value->getAction()['title']) && isset($value->getAction()['icon']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {


                    //display route with sub directory
                    if (isset($value->getAction()['sub_route']) && $value->getAction()['sub_route'] == true && isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                        // check user auth to access this route
                        if (in_array($value->getName(), $my_routes)) {


                            //check if this is the current opened
                            $active     = '';
                            $opend      = '';
                            $child_name = substr(Route::currentRouteName(), 6);
                            if(in_array($child_name, $value->getAction()['child'])){
                                $active = 'active';
                                $opend  = 'open';
                            }

                            $html .= '<li class="nav-item ' . $opend . '" >
                                    <a href="javascript:void(0);" class="'.$active.'">' . $value->getAction()['icon'] . '<span class="menu-title" data-i18n="nav.dash.main">' . awtTrans($value->getAction()['title']) . '</a>
                                    <ul class="menu-content">';

                            // display child sub directories
                            foreach ($value->getAction()['child'] as $child){
                                $active = ('admin.'.$child) == Route::currentRouteName() ? 'active' : '';


                                if (isset($routes_data['"admin.' . $child . '"']) && $routes_data['"admin.' . $child . '"']['title'] && $routes_data['"admin.' . $child . '"']['icon'])
                                    $html .=  '<li class="' .$active.' menu-item"><a href="' . route('admin.'.$child) . '">' . $routes_data['"admin.' . $child . '"']['icon'] .  awtTrans($routes_data['"admin.' . $child . '"']['title']) . ' </a></li>';
                            }

                            $html .= '</ul></li>';
                        }
                    } else {

                    if (in_array($value->getName(), $my_routes)) {
                        $active = $value->getName() == Route::currentRouteName() ? 'active' : '';
                        $open = $value->getName() == Route::currentRouteName() ? 'open' : '';

                        $html .= '<li class="nav-item '.$open.'"><a href="' . route($value->getName()) . '" class="' . $active . '">' . $value->getAction()['icon'] . ' <span class="menu-title" data-i18n="nav.scrumboard.main">' . awtTrans($value->getAction()['title']) . ' </span>  </a></li>';
                    }
                }
            }
        }
    }
    return $html ;
}

}