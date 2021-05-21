<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\users;
use App\Models\order;
use App\Models\review;
use App\Models\heart;
use Carbon\Carbon;
use App\Models\progress;

class ProductController extends Controller
{

    public function getProduct()
    {
        return product::all();
    }
    public function getALlProduct($id_user)
    {
      $product = DB::select('select p.*,s.* from product as p , shop as s where p.id_shop = s.id and s.id_user ='.$id_user);
      return $product;
    }
    public function store(Request $request)
    {
        $product = new product();
        $product->name =$request->get('name');
        $product->type =$request->get('type');
        $product->img =$request->get('img');
        $product->price =$request->get('price');
        $product->description =$request->get('description');
        $product->discount =$request->get('discount');
        $product->heart =0;
        $product->quantity =$request->get('quantity');
        $product->save();
        return response()->json('success');
    }

    public function show($id)
    {
        return product::find($id);   
    }


    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $product->name =$request->name;
        $product->type =$request->type;
        $product->img =$request->img;
        $product->price =$request->price;
        $product->description =$request->description;
        $product->discount =$request->discount;
        $product->heart =0;
        $product->quantity =$request->quantity;
        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return response()->json($product);
    }  
    public function getLineProductChart(){
        $product=product::select(product::raw('extract(month from "created_at") as month'),product::raw('COUNT(id) as sum'))
        ->whereYear('created_at', now()->year)
        ->groupBy('month')->get(); 
        $productmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($product as $product){
        for($i=1;$i<=12;$i++){
          if($i==$product["month"]){
            $productmonth[$i-1]=$product["sum"];
          }
        }
        }
        return $productmonth;
    }
    public function getLineUserChart(){
        $users=users::select(users::raw('extract(month from "created_at") as month'),users::raw('COUNT(id) as sum'))
        ->whereYear('created_at', now()->year)
        ->groupBy('month')->get();
        $userstmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($users as $users){
        for($i=1;$i<=12;$i++){
          if($i==$users["month"]){
            $userstmonth[$i-1]=$users["sum"];
          }
        }
        }
        return $userstmonth;
    }

     public function getBarOrderChart(){
      $orders= order::select(DB::raw('extract(month from "created_at") as month'),DB::raw('COUNT(id) as sum'))
      ->whereYear('created_at', now()->year)
      ->groupBy('month')->get(); 
      $ordermonth=[0,0,0,0,0,0,0,0,0,0,0,0];
      foreach($orders as $order){
      for($i=1;$i<=12;$i++){
        if($i==$order["month"]){
          $ordermonth[$i-1]=$order["sum"];
        }
      } 
      }   
      return $ordermonth;
}
  
     public function catePieChart(){
        $day =Carbon::now()->format('Y-m-d');
        $total_quantity = order::
        join('product', order::raw('id_product'),'=','product.id')
        ->groupBy('id_product','product.name')
        ->select('product.name',order::raw('COUNT(id_product) as total_quantity'))
        ->where(order::raw('CAST(orders.created_at AS DATE)'),'=',$day)
        ->take(5)
        ->get();
        return $total_quantity;
    }
    public function weekChart(){
        $total_quantity = order::select(order::raw("DATE(created_at) as date"),order::raw("(COUNT(*)) as total_quantity"))
         ->groupBy('date')
         ->get();
        return $total_quantity;
    }
    
    function getDayofYear($counter){
    // Ngày hiện tại
    $noww = Carbon::now();
    $currentDay = $noww->format('d-m-Y');

    //  $date = Carbon::now()->endOfWeek();

    // Ngày đâu và Cuối tuần
    $startdayWeek = $noww->startOfWeek();
    $firstDayWeek = $startdayWeek->format('d-m-Y');

    $enddayWeek = $noww->endOfWeek();
    $End_Week = $enddayWeek->format('d-m-Y');

    /// Ngày đầu năm
    $dayYear = $noww->firstOfYear();
    $firstDayYear = $dayYear->format('d-m-Y');

    ///
     $diffweek = strtotime($End_Week) - strtotime($currentDay);
     $numberDiffWeek = ceil(abs($diffweek / 86400));

    // Tính số ngày hiện tại của 1 năm
    $diff = strtotime($firstDayYear) - strtotime($currentDay);
    // 24 * 60 * 60 = 86400 seconds
    $numberDay = ceil(abs($diff / 86400)) +1;
    ///  7 ngày trong tuần
    $EndDay = $numberDay + $numberDiffWeek - 7*$counter;
    $startDay = $EndDay - 6;
    /// chuyển sàng ngày tháng
    return $startDay;
}

function getNumberWeek(){
    // Tuần hiện tại
    $noww = Carbon::now();
     $tuan = $noww->weekOfYear;
     return $tuan;
}
    
    public function getCountProduct(){
      $count_product=product::all()->count();
      return $count_product;
    }
    public function getCountReview(){
        $count_review=review::all()->count();
        return $count_review;
      }
     public function getCountHeart(){
        $count_heart=heart::all()->count();
        return $count_heart;
     }
      public function getCountUser(){
        $count_users=users::all()->count();
        return $count_users;
     }
}
