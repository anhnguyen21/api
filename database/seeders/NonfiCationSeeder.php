<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NonfiCationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nonfications')->insert(
            [
                'id_user'=>2,
                'id_product'=>2,
                'type'=>3,
                'content'=>'a đã đặt hoa hồng từ shop',
                'time'=>"2021-02-07 11:06:10.0000",
        	]);
            DB::table('nonfications')->insert(
            [
                'id_user'=>3,
                'id_product'=>3,
                'type'=>3,
                'content'=>'b đã mua son abc từ shop bạn',
                'time'=>"2021-02-07 11:06:10.0000",
        	]);
            DB::table('nonfications')->insert(
            [
                'id_user'=>5,
                'id_product'=>4,
                'type'=>3,
                'content'=>'lao dai đã mua đăt son từ shop bạn',
                'time'=>"2021-02-07 11:06:10.0000",
        	]);
            DB::table('nonfications')->insert(
                [
                    'id_user'=>2,
                    'id_product'=>3,
                    'type'=>3,
                    'content'=>'anh đã đặt hoa hồng từ shop bạn',
                    'time'=>"2021-02-07 11:06:10.0000",
                ]);
                DB::table('nonfications')->insert(
                [
                    'id_user'=>3,
                    'id_product'=>4,
                    'type'=>3,
                    'content'=>'anh99 đã mua son abc từ shop bạn',
                    'time'=>"2021-02-07 11:06:10.0000",
                ]);
                DB::table('nonfications')->insert(
                [
                    'id_user'=>4,
                    'id_product'=>4,
                    'type'=>3,
                    'content'=>'laoyeu đã mua abc từ shop bạn',
                    'time'=>"2021-02-07 11:06:10.0000",
                ]);
           
    }
}
