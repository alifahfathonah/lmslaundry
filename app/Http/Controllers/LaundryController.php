<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class LaundryController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth'); 
    }

    public function laundrykiloan()
    {
        $laundrykiloan = DB::table('lms_services')
                    ->where('code',2)
                    ->get();
        return view('form_laundry_kiloan', compact('laundrykiloan'));
    }
    public function laundrysatuan()
    {
        $laundrysatuan = DB::table('lms_services')
                    ->where('code',1)
                    ->get();
        return view('form_laundry_satuan', compact('laundrysatuan'));
    }

    public function createsatuan(Request $reqsatuan)
    {
        $satuan = $reqsatuan->All();
        $kode = $satuan['kode'];
        $persno = $satuan['persno'];
        $persnm = $satuan['persnm'];
        $laundrytype = $satuan['typeorder'];
        $jenisorder = $satuan['jo'];
        $hargasatuan = $satuan['hargasatuan'];
        $qty = $satuan['qty'];
        $totalsatuan = $satuan['totalsatuan'];
        $periode = date("m-Y");
        foreach ($persno as $pn => $ID){
            if ($qty[$pn]<>"")
            {
                // echo $periode." ";
                // echo $ID." ";
                // echo $kode." ";
                // echo $persnm." ";
                // echo $laundrytype." ";
                // echo $jenisorder[$pn]." ";
                // echo $hargasatuan[$pn]." ";
                // echo $qty[$pn]." ";
                // echo $totalsatuan[$pn]." ";
                // echo "<hr>";
                DB::table('lms_orders')->insert([
                    'periode'=>$periode,
                    'kode_orders'=>$kode,
                    'users_id'=>$ID,
                    'nama_pelanggan'=>$persnm,
                    'jenis_order'=>$jenisorder[$pn],
                    'harga_satuan'=>$hargasatuan[$pn],
                    'qty'=>$qty[$pn],
                    'total_harga'=>$totalsatuan[$pn],
                    'laundry_type'=>$laundrytype,                    
                ]);
            }
        }        
        return redirect('/orderstatus');
    }

    public function createkiloan(Request $reqkiloan)
    {
        $kiloan = $reqkiloan->All();
        $kode = $kiloan['kodekl'];
        $persno = $kiloan['persnokl'];
        $persnm = $kiloan['persnmkl'];
        $ids = $kiloan['ids'];        
        $laundrytype = $kiloan['typeorderkl'];        
        $periode = date("m-Y");
        $services = DB::table('lms_services')
                ->where('id_services',$ids)
                ->get();
        $jenisorder =  $services[0]->jenis;
        $harga =  $services[0]->harga;
        DB::table('lms_orders')->insert([
            'periode'=>$periode,
            'kode_orders'=>$kode,
            'users_id'=>$persno,
            'nama_pelanggan'=>$persnm,
            'jenis_order'=>$jenisorder,
            'harga_satuan'=>$harga,
            'laundry_type'=>$laundrytype,
        ]);        
        return redirect('/orderstatus');
    }
}
