<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    public function run()
    {
            DB::table('orders')->insert([
                'id_product'=>2,
                'id_user' =>2,
                'id_shop'=>1,
                'id_orderStatus'=>1,
                'quantity' =>5,
                'created_at'=>'2020-03-05 11:09:59.000000',
                'updated_at'=>'2020-05-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>6,
                'id_user' =>1,
                'id_shop'=>2,
                'id_orderStatus'=>3,
                'quantity' =>1,
                'created_at'=>'2021-05-05 11:09:59.000000',
                'updated_at'=>'2021-05-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>5,
                'id_user' =>3,
                'id_shop'=>3,
                'id_orderStatus'=>2,
                'quantity' =>2,
                'created_at'=>'2020-05-05 11:09:59.000000',
                'updated_at'=>'2020-05-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>1,
                'id_user' =>1,
                'id_shop'=>4,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2021-04-08 11:09:59.000000',
                'updated_at'=>'2021-04-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>6,
                'id_user' =>3,
                'id_shop'=>1,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2020-03-05 11:09:59.000000',
                'updated_at'=>'2020-05-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>7,
                'id_user' =>3,
                'id_shop'=>4,
                'id_orderStatus'=>2,
                'quantity' =>7,
                'created_at'=>'2020-03-05 11:09:59.000000',
                'updated_at'=>'2020-05-06 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>5,
                'id_user' =>2,
                'id_shop'=>4,
                'id_orderStatus'=>3,
                'quantity' =>4,
                'created_at'=>'2021-06-03 11:09:59.000000',
                'updated_at'=>'2021-06-08 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>10,
                'id_user' =>3,
                'id_shop'=>1,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2021-08-09 11:09:59.000000',
                'updated_at'=>'2021-09-10 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>9,
                'id_user' =>3,
                'id_shop'=>3,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2021-10-09 11:09:59.000000',
                'updated_at'=>'2021-09-10 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>5,
                'id_user' =>3,
                'id_shop'=>1,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2021-02-09 11:09:59.000000',
                'updated_at'=>'2021-09-10 11:09:59.000000'
            ]);
            DB::table('orders')->insert([
                'id_product'=>1,
                'id_user' =>2,
                'id_shop'=>4,
                'id_orderStatus'=>3,
                'quantity' =>3,
                'created_at'=>'2021-01-09 11:09:59.000000',
                'updated_at'=>'2021-09-10 11:09:59.000000'
            ]);
    }
}
