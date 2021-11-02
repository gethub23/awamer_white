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
                'icon' => 'icon-users',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('المستخدمين'),
                'count' => \App\Models\User::count(),
                'icon' => 'icon-users',
                'url' => url('admin/users'),
            ],  [
                'name' => awtTrans('وسائل التواصل'),
                'count' => \App\Models\Social::count(),
                'icon' => 'icon-thumbs-up',
                'url' => url('admin/socials'),
            ],  [
                'name' => awtTrans('الشكاوي والمقترحات'),
                'count' => \App\Models\Complaint::count(),
                'icon' => 'icon-list',
                'url' => url('admin/complaints'),
            ],  [
                'name' => awtTrans('الصلاحيات'),
                'count' => \App\Models\Role::count(),
                'icon' => 'icon-eye',
                'url' => url('admin/roles'),
            ],
        ];
    
        return $menu;
    }

}