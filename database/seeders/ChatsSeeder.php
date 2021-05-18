<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat')->insert(
            [
                'id_user'=>2,
                'id_role'=>2,
                'id_admin'=>1,
                'id_shop'=>1,
                'content'=>'shop ơi cho em hỏi',
                'time'=>"2021-02-07 11:06:10.0000",
        	]);
            DB::table('chat')->insert([
                'id_user'=>1,
                'id_role'=>0,
                'id_admin'=>1,
                'id_shop'=> 1,
                'content'=>'em cần shop tư vấn gì???',
                'time'=>"2021-02-07 11:07:10.0000"
        	]);
            DB::table('chat')->insert([
                'id_user'=>3,
                'id_role'=>0,
                'id_admin'=>1,
                'id_shop'=> 1,
                'content'=>'shop ơi?',
                'time'=>"2021-02-07 11:07:10.0000"
        	]);
            DB::table('chat')->insert([
                'id_user'=>4,
                'id_role'=>0,
                'id_admin'=>1,
                'id_shop'=> 1,
                'content'=>'shop ơi?',
                'time'=>"2021-02-07 11:07:10.0000"
        	]);
            DB::table('chat')->insert([
                'id_user'=>5,
                'id_role'=>0,
                'id_admin'=>1,
                'id_shop'=> 1,
                'content'=>'shop ơi???',
                'time'=>"2021-02-07 11:07:10.0000"
        	]);
    }
}
