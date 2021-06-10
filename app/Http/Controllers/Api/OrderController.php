<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\progress;
use App\Models\nonfication;
use App\Models\product;
use App\Models\users;
use App\Models\paymentOder;
use App\Models\payment;

class OrderController extends Controller
{
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

    public function getListOrder()
    {

        // $orders = DB::table('payment_order')
        // ->join('payment', 'payment.id', '=', 'payment_order.payment_id')
        // ->join('orders', 'orders.id', '=', 'payment_order.order_id')
        // ->groupBy('payment_order.payment_id')->get();
        // return $orders;
        $orders = DB::select('select po.*, p.*, o.*, s.*, os.*, pro.*
        from payment_order as po 
        inner join payment as p on p.id = po.payment_id
        inner join orders as o on o.id = po.order_id
        inner join order_status as os on os.id = o.id_status
        inner join shop as s on s.id = o.id_shop
        inner join product as pro on pro.id = o.id_product');
        return $orders;
    }
    public function getAllOrder($id_user)
    {
        $orders = DB::select('select po.*, p.*, o.*, s.*, os.*, pro.*
        from payment_order as po 
        inner join payment as p on p.id = po.payment_id
        inner join orders as o on o.id = po.order_id
        inner join order_status as os on os.id = o.id_status
        inner join shop as s on s.id = o.id_shop
        inner join product as pro on pro.id = o.id_product
        where s.id_user = ' . $id_user);
        return $orders;
    }

    public function store(Request $request)
    {
        //
    }
    public function show()
    {
        $pro1=DB::select("UPDATE users
         SET remember_token = 2
         WHERE id = 10");
        return $pro1;
    }

    public function getAddProduct(Request $request)
    {
        echo strval($request->get('id_user'));
        $pro = DB::select('select id , quantity, id_status from orders where id_status=0 and id_product =' . ($request->get('id_pro')) . ' and id_user=' . ($request->get('id_user')));
        $this->notificationAddProduct($request->get('id_user'), $request->get('id_pro'));
        if ($pro == null) {
            $order = new order();
            $order->id_product = $request->get('id_pro');
            $order->id_user = $request->get('id_user');
            $order->id_shop = $request->get('id_shop');
            $order->id_status = 0;
            $order->quantity = 1;
            $order->save();
            echo "add new product sussess";
            $this->MessageAddProduct($request->get('token_device'));
        } else if ($pro[0]->id_status === 0) {
            order::where("id", $pro[0]->id)->update([
                "quantity" => $pro[0]->quantity + 1
            ]);
            echo "increase quantity of product";
            $this->MessageAddProduct($request->get('token_device'));
        }
    }

    public function getAddPro(Request $request)
    {
        echo strval($request->get('id_user'));
        $pro = DB::select('select id , quantity from orders where id_product =' . ($request->get('id_pro')) . ' and id_user=' . ($request->get('id_user')));
        $this->notificationAddProduct($request->get('id_user'), $request->get('id_pro'));
        if ($pro == null) {
            $order = new order();
            $order->id_product = $request->get('id_pro');
            $order->id_user = $request->get('id_user');
            $order->id_shop = $request->get('id_shop');
            $order->id_status = 0;
            $order->quantity = 1;
            $order->save();
            echo "add new product sussess";
        } else {
            order::where("id", $pro[0]->id)->update([
                "quantity" => $pro[0]->quantity + 1
            ]);
            echo "increase quantity of product";
        }
    }

    public function notificationAddProduct($id_user, $id_pro)
    {
        $notification = new nonfication();
        $notification->id_product = $id_pro;
        $notification->id_user = $id_user;
        $notification->type = 2;
        $notification->content = 'Bạn vừa thêm sản phẩm vào giỏ hàng' . " " . product::find($id_pro)->name;
        $notification->time = date_create()->format('Y-m-d H:i:s');
        $notification->save();
        return response()->json($notification, 200);
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

    public function updateAdmin($id_payment)
    {
        $order = DB::select('select o.*, p.*, po.* 
        from orders as o, payment as p  , payment_order as po
        where o.id = po.order_id and p.id = po.payment_id
        and p.id=' . $id_payment);
        json_encode($order, TRUE);
        for ($i = 0; $i < count($order); $i++) {
            if ($order[$i]->id_status < 3) {
                $order[$i]->id_status = $order[$i]->id_status + 1;
                DB::table('orders')->where('id', $order[$i]->order_id)->update(['id_status' => $order[$i]->id_status]);
            }
        }
        return $order;
    }
    public function getOrderDetails($id)
    {
        $order = DB::select('select o.quantity as quantityCart, o.id, p.* from product as p , orders as o where o.id_status=0 and p.id =o.id_product and o.id_user =' . $id);
        return $order;
    }
    public function getOrderDetailsAdmin($id_payment)
    {  
        $order = DB::select('select o.quantity as quantityCart, p.img as image, pay.*, p.*, u.*, os.*
        from payment as pay, product as p , users as u, order_status as os, orders as o, payment_order as po  
        where o.id = po.order_id and pay.id = po.payment_id and p.id = o.id_product and pay.user_id = u.id and o.id_status = os.id and pay.id =' . $id_payment);
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
        $payment = new payment();
        $payment->user_id = $request->get('user_id');
        $payment->name_recive = $request->get('name_recive');
        $payment->total = $request->get('total');
        $payment->address = $request->get('address');
        $payment->save();
        $order = DB::select('select * from orders where id_user=' . $id);
        json_encode($order, TRUE);
        for ($i = 0; $i < count($order); $i++) {
            if ($order[$i]->id_status == 0) {
                $order[$i]->id_status = $order[$i]->id_status + 1;
                DB::table('orders')->where('id', $order[$i]->id)->update(['id_status' => $order[$i]->id_status]);
                $paymentOder = new paymentOder();
                $paymentOder->payment_id = $payment->id;
                $paymentOder->order_id = $order[$i]->id;
                $paymentOder->save();
            }
        }
        $this->notificationPayOrder($id);
        $this->MessageAddProduct($request->get('token_device'));
        return $order;
    }

    public function notificationPayOrder($id_user)
    {
        $notification = new nonfication();
        $notification->id_product=0;
        $notification->id_user=$id_user;
        $notification->type = 3;
        $notification->content = 'Bạn vừa có thêm đơn hàng mới từ' . " " . users::find($id_user)->account;
        $notification->time = date_create()->format('Y-m-d H:i:s');
        $notification->save();
        return response()->json($notification, 200);
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
    public function deleteProductInOrder(Request $request)
    {
        $pro = DB::select('select id , quantity from orders where id_product =' . $request->get('id_pro') . ' and id_user=' . $request->get('id_user'));
        if ($pro[0]->quantity > 1) {
            order::where("id", $pro[0]->id)->update([
                "quantity" => $pro[0]->quantity - 1
            ]);
            echo "decrease quantity of product";
        } else {
            DB::delete('delete from orders where id =' . $pro[0]->id);
            echo "delete product";
        }
    }

    public function deleteOrder($id)
    {
        return DB::delete('delete from orders where id =' . $id);
    }
}
