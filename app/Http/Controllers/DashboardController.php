<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $orders = DB::table('lms_orders')
                ->select('kode_orders', 'laundry_type','harga_satuan','status_order','nama_pelanggan',DB::raw('SUM(total_harga) as totalharga'))
                ->groupBy('kode_orders')
                ->get();

        return view ('dashboard', compact('orders'));
    }

    public function satuan (Request $reqsatuan)
    {
        $kodeorder = $reqsatuan->kodeorder;
        $statusorder = '3';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                ]);
        return back();
    }

    public function kiloan (Request $reqkiloan)
    {
        $kodeorder = $reqkiloan->kodeorder;
        $hargasatuan = $reqkiloan->hargasatuan;
        $qty = $reqkiloan->qty;
        $totalharga = $qty*$hargasatuan;

        $statusorder = '3';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                    'harga_satuan'=>$hargasatuan,
                    'qty'=>$qty,
                    'total_harga'=>$totalharga,
                ]);
        $invoice = DB::table('lms_invoice')
                ->where('kode_order',$kodeorder)
                ->update([
                    'total_pembayaran'=>$totalharga,
                ]);
        return back();
    }

    public function cuci (Request $reqcuci)
    {
        $kodeorder = $reqcuci->kodeorder;
        $statusorder = '4';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                ]);
        return back();
    }
    public function kering (Request $reqkering)
    {
        $kodeorder = $reqkering->kodeorder;
        $statusorder = '5';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                ]);
        return back();
    }
    public function strika (Request $reqstrika)
    {
        $kodeorder = $reqstrika->kodeorder;
        $statusorder = '6';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                ]);
        return back();
    }
    public function serahkan (Request $reqserahkan)
    {
        $kodeorder = $reqserahkan->kodeorder;
        $statusorder = '7';
        // echo $kodeorder."<br>".$statusorder;
        $updorder = DB::table('lms_orders')
                ->where('kode_orders',$kodeorder)
                ->update([
                    'status_order'=>$statusorder,
                ]);
        return back();
    }
    
}
