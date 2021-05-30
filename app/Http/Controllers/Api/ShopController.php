<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop; 
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function getShop()
    {
        $shop = DB::select('select s.*, u.* from shop as s , users as u where s.id_user = u.id');
        return $shop;
    }

    public function getAllShop() {
        return shop::all();
    }

    public function getOneShop($id) {
        return shop::find($id);
    }
    // public function getShopChart(){
    //     $shops=shop::select(shop::raw('extract(month from "created_at") as month'),shop::raw('COUNT(id) as sum'))
    //     ->whereYear('created_at', now()->year)
    //     ->groupBy('month')->get();
    //     $shopmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
    //     foreach($shops as $shop){
    //     for($i=1;$i<=12;$i++){
    //       if($i==$shop["month"]){
    //         $shopmonth[$i-1]=$shop["sum"];
    //       }
    //     }
    //     }
    //     return $shopmonth;
    // }
    public function destroy($id){
        $shop = shop::find($id);
        $shop->delete();
        return response()->json($shop);
    }
}
