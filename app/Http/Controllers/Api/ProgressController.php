<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\progress;

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
        $progress = DB::select('SELECT * from orders as o, product as pro, order_status as os WHERE os.id = o.id_status AND o.id_product = pro.id AND o.id_user ='.$id);
        return $progress;
    }

    public function getProgressWaiting($id)
    {
        $progress = DB::select('SELECT * from orders as o, product as pro, order_status as os WHERE os.id = o.id_status AND o.id_product = pro.id AND o.id_status IN (2,3,4) AND o.id_user ='.$id);
        return $progress;
    }

    public function getProgressSucess($id)
    {
        $progress = DB::select('SELECT * from orders as o, product as pro, order_status as os WHERE os.id = o.id_status AND o.id_product = pro.id AND o.id_status=5 AND o.id_user ='.$id);
        return $progress;
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
