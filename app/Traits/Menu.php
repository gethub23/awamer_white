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
                'icon' => '<i class="fas fa-users" style="font-size: 29px;margin: 11px;color: #135ef6;"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('المستخدمين'),
                'count' => \App\Models\User::count(),
                'icon' => '<i class="fas fa-user-secret" style="font-size: 29px;margin: 11px;color: #135ef6;"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('وسائل التواصل'),
                'count' => \App\Models\Social::count(),
                'icon' => '<i class="fas fa-thumbs-up" style="font-size: 29px;margin: 11px;color: #135ef6;"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('الشكاوي والمقترحات'),
                'count' => \App\Models\Complaint::count(),
                'icon' => '<i class="fas fa-list" style="font-size: 29px;margin: 11px;color: #135ef6;"></i>',
                'url' => url('admin/admins'),
            ],  [
                'name' => awtTrans('الصلاحيات'),
                'count' => \App\Models\Role::count(),
                'icon' => '<i class="fas fa-eye " style="font-size: 29px;margin: 11px;color: #135ef6;"></i>',
                'url' => url('admin/roles'),
            ],
        ];
    
        return $menu;
    }

}