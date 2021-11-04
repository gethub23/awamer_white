<?php


use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            'identity'      => 'QWERT' , 
            'type'          => 'ratio',
            'discount'      => 10,
            'max_discount'  => 20,
            'usage'         => 100,
            'total_usage'   => 40,
            'status'        => 'available',
            'expire_date'   => \Carbon\Carbon::now()->addDays(10),
        ]);
        
        DB::table('coupons')->insert([
            'identity'      => 'JAKA' , 
            'type'          => 'number',
            'discount'      => 20,
            'max_discount'  => 20,
            'usage'         => 100,
            'total_usage'   => 40,
            'status'        => 'available',
            'expire_date'   => \Carbon\Carbon::now()->addDays(10),
        ]);
        DB::table('coupons')->insert([
            'identity'      => 'UsageEnd' , 
            'type'          => 'ratio',
            'discount'      => 10,
            'max_discount'  => 20,
            'usage'         => 100,
            'total_usage'   => 100,
            'status'        => 'usage_end',
            'expire_date'   => \Carbon\Carbon::now()->addDays(1),
        ]);
        DB::table('coupons')->insert([
            'identity'      => 'Expire' , 
            'type'          => 'number',
            'discount'      => 10,
            'max_discount'  => 10,
            'usage'         => 100,
            'total_usage'   => 10,
            'status'        => 'expire',
            'expire_date'   => \Carbon\Carbon::now(),
        ]);
    }
}
