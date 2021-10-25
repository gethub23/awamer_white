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
            'active'    => true,
        ]);
        User::create([
            'name'      => 'fekry2',
            'email'     => 'm2@a.s',
            'phone'     => '1069541295',
            'password'  => 123456,
            'active'    => false,
        ]);
        User::create([
            'name'      => 'fekry3',
            'email'     => 'm3@a.s',
            'phone'     => '1069541296',
            'password'  => 123456,
            'active'    => false,
        ]);
        User::create([
            'name'      => 'fekry4',
            'email'     => 'm4@a.s',
            'phone'     => '1069541297',
            'password'  => 123456,
            'active'    => true,
        ]);
    }
}
