<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CartLaundryController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth'); 
    }

    public function mycart()
    {
         
        $mycard = DB::table('lms_orders')
                ->select('kode_orders', 'laundry_type','status_order',DB::raw('SUM(total_harga) as totalharga'))
                ->groupBy('kode_orders')
                ->where('status_order','<=',6)
                ->get();
        
        $harga = DB::table('lms_orders')
                ->get();
        return view('table_my_card', compact('mycard', 'harga'));
    }

    public function detailorders(Request $reqkode)
    {
        $key = $reqkode->All();
        $kode = $key['kode'];

        $myorder = DB::table('lms_orders')
                    ->where('kode_orders',$kode)
                    ->get();
        $myinv = DB::table('lms_invoice')
                    ->where('kode_order',$kode)
                    ->get();
        return response()
                    ->view ('detailorders', compact('myorder','kode','myinv'));
        
    }

    public function postorder(Request $requpdate)
    {
        $ok = $requpdate->All();
        $delivery = $ok['delivery'];
        $kodeorder = $ok['kodeorder'];
        $periode = date("mY");
        $noinvoice = $kodeorder."".$periode;
        $total = $ok['total'];
        $userid = $ok['userid'];
        $username = $ok['username'];
        
        DB::table('lms_orders')
            ->where('kode_orders',$kodeorder)
            ->update([
                'delivery_order'=>$delivery,
                'status_order'=>'2',
            ]);
        
        DB::table('lms_invoice')->insert([
            'periode'=>$periode,
            'no_invoice'=>$noinvoice,
            'kode_order'=>$kodeorder,
            'total_pembayaran'=>$total,
            'users_id'=>$userid,
            'pelanggan_name'=>$username,
            'status'=>'1',
        ]);
        return back();
    }
}
