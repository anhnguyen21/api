<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\progress;
use App\Models\deliver;
use App\Models\nonfication;
use App\Models\payment;
use App\Models\users;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getProgress($id)
    {
        $progress = DB::select('SELECT o.*, pro.*, sh.*, o.quantity as quantityCart, pro.name as nameproduct from orders as o, product as pro, shop as sh WHERE sh.id = o.id_shop AND o.id_product = pro.id AND o.id_user ='.$id.' ORDER BY o.created_at DESC');
        return $progress;
    }

    public function getProgressWaiting($id)
    {
        $progress = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as os WHERE os.id = o.id_status AND p.id = po.payment_id AND o.id_status IN (1,2,3,4) AND po.order_id= o.id AND o.id_shop= sh.id AND p.user_id ='.$id.' ORDER BY o.created_at DESC');
        return $progress;
    }

    public function getProgressSucess($id)
    {
        $progress = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as os WHERE os.id = o.id_status AND p.id = po.payment_id AND o.id_status = 5 AND po.order_id= o.id AND o.id_shop= sh.id AND p.user_id ='.$id.' ORDER BY o.created_at DESC');
        return $progress;
    }

    public function getOrderForDelivery(){
        $deliver = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as os WHERE os.id = o.id_status AND p.id = po.payment_id AND po.order_id= o.id AND o.id_shop= sh.id ORDER BY o.created_at DESC');
        return $deliver;
    }

    public function getOrderForDeliveryCanOrder(){
        $deliver = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as os WHERE os.id = o.id_status AND p.id = po.payment_id AND po.order_id= o.id AND o.id_shop= sh.id AND o.id_status = 3 ORDER BY o.created_at DESC');
        return $deliver;
    }

    public function getOrderForAccept($id){
        $deliver = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as  os, deliver as d WHERE d.id_payment = p.id AND os.id = o.id_status AND p.id = po.payment_id AND po.order_id= o.id AND o.id_shop= sh.id AND os.id = 4 AND d.id_user = '.$id.' ORDER BY o.created_at DESC');
        return $deliver;
    }

    public function getOrderForComplete($id){
        $deliver = DB::select('SELECT * from payment as p, payment_order as po, orders as o, shop as sh , order_status as  os, deliver as d WHERE d.id_payment = p.id AND os.id = o.id_status AND p.id = po.payment_id AND po.order_id= o.id AND o.id_shop= sh.id AND os.id = 5 AND d.id_user = '.$id.' ORDER BY o.created_at DESC');
        return $deliver;
    }

    public function getPaymentAdmin() {
        $orders = DB::table('payment_order')
        ->join('payment', 'payment.id', '=', 'payment_order.payment_id')
        ->join('orders', 'orders.id', '=', 'payment_order.order_id')
        ->get()
        ->groupBy('payment_order.payment_id');
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
    
    public function ordertodeliver(Request $request) {
        $deliver = new deliver();
        $deliver->id_user = $request->get('user_id');
        $deliver->id_payment = $request->get('id_payment');
        $deliver->time = date_create()->format('Y-m-d H:i:s');
        $deliver->save();
        $order = DB::table('payment_order')
        ->join('payment', 'payment.id', '=', 'payment_order.payment_id')
        ->join('orders', 'orders.id', '=', 'payment_order.order_id')
        ->where('payment_order.payment_id' ,$request->get('id_payment'))
        ->get();
        json_encode($order, TRUE);
        for ($i = 0; $i < count($order); $i++) {
            if ($order[$i]->id_status == 3) {
                $order[$i]->id_status = $order[$i]->id_status + 1;
                DB::table('orders')->where('id', $order[$i]->id)->update(['id_status' => $order[$i]->id_status]);
            }
        }
        if ($order != null) {
            $notification = new nonfication();
            $notification->id_product = 0;
            $notification->id_user = $request->get('user_id');
            $notification->type = 2;
            $notification->content = 'Đã có tài xế nhận đơn hàng của bạn' . " " . users::find($request->get('user_id'))->name;
            $notification->time = date_create()->format('Y-m-d H:i:s');
            $notification->save();

            $notification = new nonfication();
            $notification->id_product = 0;
            $notification->id_user = $request->get('user_id');
            $notification->type = 3;
            $notification->content = 'Tài xế '.users::find($request->get('user_id'))->account.' đã nhận đơn hàng '.payment::find($request->get('id_payment'))->name_recive;
            $notification->time = date_create()->format('Y-m-d H:i:s');
            $notification->save();
        }
        $this->MessageAddProduct($request->get('token_device'));
        return $order;
    }

    public function ordertoConfirm(Request $request) {
        $order = DB::table('payment_order')
        ->join('payment', 'payment.id', '=', 'payment_order.payment_id')
        ->join('orders', 'orders.id', '=', 'payment_order.order_id')
        ->where('payment_order.payment_id' ,$request->get('id_payment'))
        ->get();
        json_encode($order, TRUE);
        for ($i = 0; $i < count($order); $i++) {
            if ($order[$i]->id_status == 4) {
                $order[$i]->id_status = $order[$i]->id_status + 1;
                DB::table('orders')->where('id', $order[$i]->id)->update(['id_status' => $order[$i]->id_status]);
            }
        }
        if ($order != null) {
            $notification = new nonfication();
            $notification->id_product = 0;
            $notification->id_user = $request->get('user_id');
            $notification->type = 2;
            $notification->content = 'Món quà đã được giao thành công' . " " . users::find($request->get('user_id'))->name;
            $notification->time = date_create()->format('Y-m-d H:i:s');
            $notification->save();

            $notification = new nonfication();
            $notification->id_product = 0;
            $notification->id_user = $request->get('user_id');
            $notification->type = 3;
            $notification->content = 'Tài xế '.users::find($request->get('user_id'))->account.' đã giao đơn hàng thành công'.payment::find($request->get('id_payment'))->name_recive;
            $notification->time = date_create()->format('Y-m-d H:i:s');
            $notification->save();
        }
        $this->MessageAddProduct($request->get('token_device'));
        return $order;
    }

    function MessageAddProduct($token_device)
    {
        $token = $token_device;
        $from = "AAAA9kCHXEc:APA91bHGrJhFm8Ft0Tsh9XGjEFSvOaMpvLaI01EvdXttXhRabQVrdnjpHUsvFvCVcxLIzevVVuuOwxzhW0Gfw_p8i5EBS5n3cDj44JfdI_F4hH82R0QBo2-tR-CtyDynd-BPpVtCw0PY";
        $msg = array(
            'body'  => "Bạn mừa mới thêm sản phẩm vào giỏ hàng",
            'title' => "Xác nhận sản phẩm",
            'receiver' => 'erw',
            'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );

        $fields = array(
            'to'        => $token,
            'notification'  => $msg
        );

        $headers = array(
            'Authorization: key=' . $from,
            'Content-Type: application/json'
        );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        dd($result);
        curl_close($ch);
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
        $progress = progress::find($id);
        $progress -> state = $progress->state + 1;
        $progress ->save();
        return response()->json($progress);
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
