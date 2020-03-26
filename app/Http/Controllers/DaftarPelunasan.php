<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPembayaran;
use App\User;
use DB;



class DaftarPelunasan extends Controller
{
    public function index(){
        return view('admin.pelunasan-pembayaran');
    }

    public function listPelunasanPembayaran(Request $request){
        $semester=$request->input('semester');
        
        $dataPelunasan=DB::table('status_pembayaran')
        ->join('users', 'users.id_user', '=', 'status_pembayaran.id_user')
        ->select('status_pembayaran.*', 'users.name','users.id_prodi')
        ->where('semester',$semester)
        ->where('users.status_perkuliahan','aktif')
        ->get();

        return view('admin.list-pelunasan-pembayaran')
        ->with('dataPelunasan',$dataPelunasan)
        ->with('semester',$semester);
    }
}
