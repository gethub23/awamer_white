<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Country::create([
            'name' => ['ar' => 'السعودية' , 'en' => 'Saudi Arabia'] , 
            'key'  => '+966'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'مصر' , 'en' => 'Egypt'] , 
            'key'  => '+20'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'الامارات' , 'en' => 'UAE'] , 
            'key'  => '+971'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'البحرين' , 'en' => 'El-Bahrean'] , 
            'key'  => '+973'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'قطر' , 'en' => 'Qatar'] , 
            'key'  => '+974'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'ليبيا' , 'en' => 'Libya'] , 
            'key'  => '+218'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'الكويت' , 'en' => 'Kuwait'] , 
            'key'  => '+965'   , 
        ]);
        Country::create([
            'name' => ['ar' => 'عمان' , 'en' => 'Oman'] , 
            'key'  => '‎+968'   , 
        ]);
    }
}
