<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            'name'           => json_decode(['ar' => 'seeed' , 'en' => 'sdafffa'])
            'image'          => '1.png' , 
        ]);
    }
}
