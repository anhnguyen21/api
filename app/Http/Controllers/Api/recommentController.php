<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recomment;

class recommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recomment = recomment::all();
        $item_arr = array(
            "male"=> "1",
            "female"=> "0",
            "18-22t"=> "1",
            "22-35t"=> "0",
            "35-55t"=> "0",
            "55-70t"=> "0",
            "blue"=> "1",
            "red"=> "0",
            "yellow"=> "0",
            "green"=> "0",
            "while"=> "0",
            "football"=> "0",
            "walk"=> "1",
            "read_book"=> "0",
            "watch_tv"=> "0",
            "travel"=> "0"
        );
        $result = [];
        foreach ($recomment as $indx => $values) {
        // for($i=0; $i<count($recomment); $i++){
            $arr = json_decode($values -> arr_recomment);
            $set = [];
            foreach ($arr as $index => $value) {
                $set[] = $value - $item_arr[$index] ?? 0;
            }
            $distance = (float)sqrt(array_sum(array_map(function ($x) { return pow($x, 2); }, $set)));
            $result += [$indx => 1 - $distance];
        }
        $product= array_keys($result,max($result));

        echo $product[0];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recomment = recomment::all();
        $item_arr = $request -> arr_recomment;
        $result = [];
        foreach ($recomment as $indx => $values) {
        // for($i=0; $i<count($recomment); $i++){
            $arr = json_decode($values -> arr_recomment);
            $set = [];
            foreach ($arr as $index => $value) {
                $set[] = $value - $item_arr[$index] ?? 0;
            }
            $distance = (float)sqrt(array_sum(array_map(function ($x) { return pow($x, 2); }, $set)));
            $result += [$indx => 1 - $distance];
        }
        $product= array_keys($result,max($result));

        return $product[0];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
