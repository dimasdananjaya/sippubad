<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\User;
use App\Prodi;
use App\Biaya_Prodi;
use App\Periode;
use App\Pembayaran;
use App\StatusPembayaran;

class PrintController extends Controller
{
    public function printPembayaran(Request $request)
    {
        $id_pembayaran=$request->input('id_pembayaran');
        $id_user=$request->input('id_user');
        //$dataPembayaran=DB::select(DB::raw("SELECT * FROM pembayaran WHERE id_user='$id'"));

        $dataPembayaran= DB::table('pembayaran')
        ->join('periode', 'periode.id_periode', '=', 'pembayaran.id_periode')
        ->join('users', 'users.id_user', '=', 'pembayaran.id_user')
        ->join('prodi', 'prodi.id_prodi', '=', 'pembayaran.id_prodi')
        ->select('pembayaran.*', 'periode.periode','users.name','prodi.prodi','users.kelas')
        ->where('id_pembayaran',$id_pembayaran)
        ->get();

        $dataKelas=DB::select(DB::raw("SELECT kelas FROM users WHERE id_user='$id_user'"));

        return view('admin.admin-print-pembayaran')
        ->with('dataPembayaran',$dataPembayaran)
        ->with('dataKelas',$dataKelas);
    }

    public function printTagihan(Request $request)
    {
        $id_tagihan=$request->input('id_tagihan');
        $id_user=$request->input('id_user');

        $dataTagihan= DB::table('tagihan')
        ->join('periode', 'periode.id_periode', '=', 'tagihan.id_periode')
        ->join('users', 'users.id_user', '=', 'tagihan.id_user')
        ->select('pembayaran.*', 'periode.periode','users.name','prodi.prodi','users.kelas')
        ->where('id_tagihan',$id_tagihan)
        ->get();

        return view('admin.admin-print-tagihan')
        ->with('dataTagihan',$dataPembayaran);
    }
}
