<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class recomment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recomment')->insert([
            "id"=> 1,
            "product_id"=> 1,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "1",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 2,
            "product_id"=> 2,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "0",
                "22-35t": "0",
                "35-55t": "1",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "0",
                "green": "1",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "1",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 3,
            "product_id"=> 3,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "1",
                "red": "0",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 4,
            "product_id"=> 4,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "1",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 5,
            "product_id"=> 5,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "1",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "1",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 6,
            "product_id"=> 6,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "0",
                "green": "0",
                "while": "1",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 7,
            "product_id"=> 7,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "1",
                "red": "0",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "1",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 8,
            "product_id"=> 8,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "1",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 9,
            "product_id"=> 9,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "1",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "1"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 10,
            "product_id"=> 10,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "0",
                "22-35t": "0",
                "35-55t": "1",
                "55-70t": "0",
                "blue": "0",
                "red": "1",
                "yellow": "0",
                "green": "0",
                "while": "1",
                "football": "0",
                "walk": "1",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 11,
            "product_id"=> 11,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "0",
                "22-35t": "1",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "1",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "0",
                "read_book": "1",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 12,
            "product_id"=> 12,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "0",
                "22-35t": "1",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "1",
                "red": "0",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "0",
                "walk": "1",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 13,
            "product_id"=> 13,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "0",
                "green": "0",
                "while": "1",
                "football": "0",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "1",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 14,
            "product_id"=> 14,
            "arr_recomment" => '{
                "male": "0",
                "female": "1",
                "18-22t": "1",
                "22-35t": "0",
                "35-55t": "0",
                "55-70t": "0",
                "blue": "0",
                "red": "1",
                "yellow": "0",
                "green": "0",
                "while": "0",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "0"
            }'
        ]);
        DB::table('recomment')->insert([
            "id"=> 15,
            "product_id"=> 15,
            "arr_recomment" => '{
                "male": "1",
                "female": "0",
                "18-22t": "0",
                "22-35t": "0",
                "35-55t": "1",
                "55-70t": "0",
                "blue": "0",
                "red": "0",
                "yellow": "0",
                "green": "1",
                "while": "0",
                "football": "1",
                "walk": "0",
                "read_book": "0",
                "watch_tv": "0",
                "travel": "1"
            }'
        ]);
    }
}
