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
        	]);
        DB::table('users')->insert([
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
            "account"=> "anh99",
            "firstName"=> "anh",
            "lastName"=> "Nguyen",
            "email"=> "yeu@gmail.com",
            "phone"=> "1",
            "gender"=> "1",
            "address"=> "1",
            "password" => Hash::make(123),
            "birthday"=> "2021-02-24",
            "img"=> "https://scr.vn/wp-content/uploads/2020/07/%E1%BA%A2nh-%C4%91%C3%B4i-anime-n%E1%BB%AF.jpg",
            "remember_token"=> "2",
            "created_at"=> "2021-05-07 11:06:10.000000",
            "updated_at"=> "2021-06-28 11:06:10.000000"
        ]);
        DB::table('users')->insert([
            "account"=> "laoyeu",
            "firstName"=> "yeu",
            "lastName"=> "lao",
            "email"=> "yeuho@gmail.com",
            "phone"=> "1",
            "gender"=> "1",
            "address"=> "1",
            "password" => Hash::make(333),
            "birthday"=> "2021-02-24",
            "img"=> "https://hiclinic-ms-notification.herokuapp.com/admins/clinicNotification?page=0",
            "remember_token"=> "2",
            "created_at"=> "2021-05-07 11:06:10.000000",
            "updated_at"=> "2021-06-28 11:06:10.000000"
        ]);
        DB::table('users')->insert([
            "account"=> "laodai",
            "firstName"=> "dai",
            "lastName"=> "lao",
            "email"=> "yeulao@gmail.com",
            "phone"=> "1",
            "gender"=> "1",
            "address"=> "1",
            "password" => Hash::make(444),
            "birthday"=> "2021-02-24",
            "img"=> "https://i.pinimg.com/736x/f6/fd/14/f6fd14e8e56da3e2e3ee7e46f0c1be44.jpg",
            "remember_token"=> "2",
            "created_at"=> "2021-05-07 11:06:10.000000",
            "updated_at"=> "2021-06-28 11:06:10.000000"
        ]);
        
    }
}
