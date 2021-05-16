<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\progress;
use App\Models\nonfication;
use App\Models\product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrder()
    {
        $orders = order::all();
        foreach ($orders as $order) {
            $order->product;
            $order->users;
            $order->order_status;
           }
     return $orders;
    }
    public function getAllOrder($id_user)
    {
        $orders = DB::select('select o.*,s.* from orders as o , shop as s where o.id_shop = s.id and s.id_user ='.$id_user);
      return $orders;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    
    public function getAddProduct(Request $request)
    {
        echo strval($request->get('id_user'));
        $pro=DB::select('select id , quantity from orders where id_product ='.($request->get('id_pro')).' and id_user='.($request->get('id_user')));
        $this->notificationAddProduct($request->get('id_user'),$request->get('id_pro'));
        if($pro==null){
            $order=new order();
            $order->id_product=$request->get('id_pro');
            $order->id_user=$request->get('id_user');
            $order->id_shop=$request->get('id_shop');
            $order->id_orderStatus=1;
            $order->quantity=1;
            $order->save();
            echo "add new product sussess";
            $this->MessageAddProduct($request->get('token_device'));
        }else{
            order::where("id", $pro[0]->id)->update([
              "quantity" =>$pro[0]->quantity+1
          ]);
          echo "increase quantity of product";
          $this->MessageAddProduct($request->get('token_device'));
        }
    }

    public function getAddPro(Request $request)
    {
        echo strval($request->get('id_user'));
        $pro=DB::select('select id , quantity from orders where id_product ='.($request->get('id_pro')).' and id_user='.($request->get('id_user')));
        $this->notificationAddProduct($request->get('id_user'),$request->get('id_pro'));
        if($pro==null){
            $order=new order();
            $order->id_product=$request->get('id_pro');
            $order->id_user=$request->get('id_user');
            $order->id_shop=$request->get('id_shop');
            $order->id_orderStatus=1;
            $order->quantity=1;
            $order->save();
            echo "add new product sussess";
        }else{
            order::where("id", $pro[0]->id)->update([
              "quantity" =>$pro[0]->quantity+1
          ]);
          echo "increase quantity of product";
        }
    }

    public function notificationAddProduct($id_user, $id_pro)
    {
        $notification = new nonfication();
        $notification->id_product=$id_pro;
        $notification->id_user=$id_user;
        $notification->type = 2;
        $notification->content = 'Bạn vừa thêm sản phẩm vào giỏ hàng'." ".product::find($id_pro)->name;
        $notification->time = date_create()->format('Y-m-d H:i:s');
        $notification->save();
        return response()->json($notification,200);
    }

    function MessageAddProduct($token_device){
        $token =$token_device;  
        $from = "AAAA9kCHXEc:APA91bHGrJhFm8Ft0Tsh9XGjEFSvOaMpvLaI01EvdXttXhRabQVrdnjpHUsvFvCVcxLIzevVVuuOwxzhW0Gfw_p8i5EBS5n3cDj44JfdI_F4hH82R0QBo2-tR-CtyDynd-BPpVtCw0PY";
        $msg = array
              (
                'body'  => "Bạn mừa mới thêm sản phẩm vào giỏ hàng",
                'title' => "Xác nhận sản phẩm",
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );
  
        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );
  
        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }

    public function getOrderDetails($id)
    {
        $order = DB::select('select o.quantity as quantityCart, p.* from product as p , orders as o where p.id =o.id_product and o.id_user ='.$id);
        return $order;
    }
    public function getOrderDetailsAdmin($id)
    {
        $order = order::find($id);
        return $order;
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
        $order=DB::select('select * from orders where id_user='.$id);
        json_encode($order, TRUE);
        for($i=0 ; $i<count($order) ; $i++){
            if($order[$i]->id_orderStatus = 1){
                $order[$i]->id_orderStatus = $order[$i]->id_orderStatus + 1;
                DB::table('orders')->where('id', $order[$i]->id)->update(['id_orderStatus' => $order[$i]->id_orderStatus]);
            }
        }
        $this->MessageAddProduct($request->get('token_device'));   
        return $order;  
    }

    public function updateAdmin(Request $request, $id)
    {
        $orders = order::find($id);
            $orders->order_status;
            if($orders->order_status[0]->id < 5){
                $orders->id_orderStatus = $orders->id_orderStatus + 1;
                $orders->save();
            }
        return $orders;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oders = order::find($id);
        $oders->delete();
        return response()->json($oders);
    }
    public function deleteProductInOrder(Request $request){
        $pro=DB::select('select id , quantity from orders where id_product ='.$request->get('id_pro').' and id_user='.$request->get('id_user'));
        if($pro[0]->quantity > 1){
            order::where("id", $pro[0]->id)->update([
                "quantity" =>$pro[0]->quantity-1
            ]);
            echo "decrease quantity of product";
        }else{
            DB::delete('delete from orders where id ='.$pro[0]->id);
            echo "delete product";
        }
    }

    public function deleteOrder($id){
        return DB::delete('delete from orders where id ='.$id);
    }
}
