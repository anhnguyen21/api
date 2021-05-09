<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotion')->insert([
            'promotion'=>'PNVM',
            'content' =>'Mừng ngày phụ nữ Việt Nam',
            'exp'=>100
        ]);
        DB::table('promotion')->insert([
            'promotion'=>'30/4',
            'content' =>'Mừng ngày độc lập',
            'exp'=>100
        ]);
    }
}
