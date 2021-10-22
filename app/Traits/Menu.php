<?php

namespace App\Traits;

trait  menu
{
    public function home()
    {
        $menu = [
            [
                'name' => awtTrans('المشرفين'),
                'count' => \App\Models\Admin::count(),
                'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('المستخدمين'),
                'count' => \App\Models\User::count(),
                'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('وسائل التواصل'),
                'count' => \App\Models\Social::count(),
                'icon' => '<i class="la la-facebook font-large-2 float-left"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('الشكاوي والمقترحات'),
                'count' => \App\Models\Complaint::count(),
                'icon' => '<i class="la la-facebook font-large-2 float-left"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('الصلاحيات'),
                'count' => \App\Models\Role::count(),
                'icon' => '<i class="la la-eye font-large-2 float-left"></i>',
                'url' => url('admin/roles'),
            ],
        ];
    
        return $menu;
    }

}