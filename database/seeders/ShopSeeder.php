<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop')->insert([
            'id_user' => 1,
            'name'=> 'Yeu ho',
            'address'=> '101B Le huu trac, phuoc my son tra',
            'image'=> '',
            'lat'=> 'sđf',
            'lng'=>'dgsdg',
            'distance'=>3
        ]);
        DB::table('shop')->insert([
            'id_user' => 1,
            'name'=> 'Lao hahah',
            'address'=> '101B Le huu trac, phuoc my son tra',
            'image'=> '',
            'lat'=> 'sđf',
            'lng'=>'dgsdg',
            'distance'=>3
        ]);
        DB::table('shop')->insert([
            'id_user' => 2,
            'name'=> 'Lao Hac',
            'address'=> '106B Le huu trac, phuoc my son tra',
            'image'=> '',
            'lat'=> 'sđf',
            'lng'=>'dgsdg',
            'distance'=>6
        ]);
        DB::table('shop')->insert([
            'id_user' => 1,
            'name'=> 'Lao Yeu',
            'address'=> '99 to hien thanh, phuoc my son tra',
            'image'=> '',
            'lat'=> 'sđf',
            'lng'=>'dgsdg',
            'distance'=>8
        ]);
    }
}
