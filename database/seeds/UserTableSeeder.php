<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name'      => 'fekry',
            'email'     => 'm1@a.s',
            'phone'     => '1069541294',
            'password'  => 123456,
            'active'    => 1,
        ]);
    }
}
