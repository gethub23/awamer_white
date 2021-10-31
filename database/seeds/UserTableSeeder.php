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
        
        for ($i=0; $i < 100 ; $i++) { 
            User::create([
                'name'      => 'fekry',
                'email'     => rand(1,100000000) .'m1@a.s',
                'phone'     => rand(100000000,9000000000) ,
                'password'  => 123456,
                'active'    => rand(0,1),
            ]);
        }
    }
}
