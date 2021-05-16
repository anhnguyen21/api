<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\nonfication;

class NonficationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return nonfication::all();
    }
    
    // public function getNotification($id)
    // {
    //     $notification = DB::table('nonfications')
    //     ->select('nonfications.*')
    //     ->where('id_user',$id)
    //     ->get();
    //     return $notification;
    // }
    public function getNotification($id){
        $notification = DB::select('select u.*,n.*,p.* from nonfications as n , users as u, product as p where n.id_user=u.id and n.id_product = p.id');
        return $notification;
        echo "get notification";
    }
    public function getNotificationShop($id){
        $notification = DB::select('select n.*,p.* from nonfications as n,
        product as p where n.id_product = p.id and p.id_shop ='.$id);
        return $notification;
        $notification = DB::select('select u.*,n.*,p.* from nonfications as n , users as u, product as p where n.id_user=u.id and n.id_product = p.id and u.id='.$id);
        return $notification;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $notification = new nonfication();
            $notification->id_product=$request->get('id_product');
            $notification->id_user=$request->get('id_user');
            $notification->type = $request->get('type');
            $notification->content = $request->get('content');
            $notification->time = date_create()->format('Y-m-d H:i:s');
            $notification->save();
            return response()->json($notification,200);
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
        $nonti = nonfication::find($id);
        $nonti->delete();
        return response()->json($nonti);
        echo "delete success";
    }
}
