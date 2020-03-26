<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use DB;
use App\Periode;

class RekapPembayaranPeriode extends Controller
{
    public function rekapPembayaranPeriode(){
        $dataPeriode=Periode::all();

        return view('admin.pembayaran-periode')
        ->with('dataPeriode',$dataPeriode);
    }

    public function listPembayaranPeriode(Request $request){
        $id_periode=$request->input('id_periode');
        $periode=DB::select(DB::raw("SELECT periode FROM periode WHERE id_periode='$id_periode'"));
        $dataPembayaranPeriode=DB::table('pembayaran')
        ->join('users', 'users.id_user', '=', 'pembayaran.id_user')
        ->join('prodi', 'prodi.id_prodi', '=', 'pembayaran.id_prodi')
        ->select('pembayaran.*', 'users.name','users.nim','prodi.prodi')
        ->whereNotIn('tipe', ['potongan'])
        ->where('id_periode',$id_periode)
        ->get();
        
        $totalPembayaranPeriode=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_periode='$id_periode' AND tipe NOT IN('potongan')"));

        return view('admin.pembayaran-periode-list')
        ->with('periode',$periode)
        ->with('dataPembayaranPeriode',$dataPembayaranPeriode)
        ->with('totalPembayaranPeriode',$totalPembayaranPeriode)
        ;
    }
}
