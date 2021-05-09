<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'content'=>'Chờ xác nhận'
        ]);
        DB::table('order_status')->insert([
            'content'=>'Chờ lấy hàng'
        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đến kho giao hàng'

        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đang giao'

        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đã giao'
        ]);
    }
}
