<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      => 'المدير العام',
            'email'     => 'aait@info.com',
            'phone'     => '0555105813',
            'password'  => 123456,
            'role_id'   => 1,
        ]);
    }
}
