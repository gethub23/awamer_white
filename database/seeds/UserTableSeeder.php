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
        
        for ($i=0; $i < 10 ; $i++) { 
            User::create([
                'name'      => 'fekry',
                'email'     => 'aa926626'.rand(1111111,333333).'@gmail.com',
                'phone'     => rand(100000000,9000000000) ,
                'password'  => 123456,
                'block'     => rand(0,1),
                'active'    => rand(0,1),
            ]);
        }
    }
}