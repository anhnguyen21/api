<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id'=>1,
                'account'=>'onho',
                'firstName'=>'on',
                'lastName'=>'hoon',
                'email'=>'hothion@gmai.com',
                'phone'=>'7898686867',
                'gender'=>'Meow',
                'address'=>'101B Le Huu Trac',
                'password'=>Hash::make('123'),
                'birthday'=>'2021-02-24',
                'img'=>'https://img1.kienthucvui.vn/uploads/2021/01/09/anh-dai-dien-dep-de-thuong-cho-con-gai_043118175.jpeg',
                'remember_token'=>1,
                "created_at"=> "2021-02-07 11:06:10.000000",
                "updated_at"=> "2021-02-28 11:06:10.000000"
        	],
            [
            "id"=> 2,
            "account"=> "anhnguyen",
            "firstName"=> "Anh",
            "lastName"=> "Anh Nguyen",
            "email"=> "anhanh5811@gmail.com",
            "phone"=> "0123456789",
            "gender"=> "1",
            "address"=> "Trieu Long, Trieu Phong, Quang Tri.",
            "password" => Hash::make(123),
            "birthday"=> "2021-02-21",
            "img"=> "https://1.bp.blogspot.com/-8Z4fYURRKh0/XqZl2livJBI/AAAAAAAAjO4/DgIwuLKAoCUxlZSjQc363n_I0cV_XfKrQCLcBGAsYHQ/s1600/Anh-avatar-dep-cho-con-trai%2B%252823%2529.jpg",
            "remember_token"=> "0",
            "created_at"=> "2021-04-07 11:06:10.000000",
            "updated_at"=> "2021-02-28 11:06:10.000000"
        ]);
        DB::table('users')->insert([
            "id"=> 3,
            "account"=> "anh",
            "firstName"=> "anh",
            "lastName"=> "Nguyen",
            "email"=> "1123",
            "phone"=> "1",
            "gender"=> "1",
            "address"=> "1",
            "password" => Hash::make(123),
            "birthday"=> "2021-02-24",
            "img"=> "https://i.9mobi.vn/cf/Images/tt/2021/3/15/hinh-anh-dai-dien-dep-dung-cho-facebook-instagram-zalo-11.jpg",
            "remember_token"=> "0",
            "created_at"=> "2021-05-07 11:06:10.000000",
            "updated_at"=> "2021-06-28 11:06:10.000000"
        ]);
        DB::table('users')->insert([
            "id"=> 4,
            "account"=> "anh99",
            "firstName"=> "anh",
            "lastName"=> "Nguyen",
            "email"=> "112",
            "phone"=> "1",
            "gender"=> "1",
            "address"=> "1",
            "password" => Hash::make(123),
            "birthday"=> "2021-02-24",
            "img"=> "https://i.9mobi.vn/cf/Images/tt/2021/3/15/hinh-anh-dai-dien-dep-dung-cho-facebook-instagram-zalo-11.jpg",
            "remember_token"=> "2",
            "created_at"=> "2021-05-07 11:06:10.000000",
            "updated_at"=> "2021-06-28 11:06:10.000000"
        ]);
    }
}
