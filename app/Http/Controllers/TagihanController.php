<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;
use DB;
use Validator;

class TagihanController extends Controller
{
    public function tambahTagihan(Request $request){
        //simpan data tagihan per mahasiswa
        $simpan=new Tagihan;
        $simpan->id_user=$request->input('id_user');
        $simpan->id_periode=$request->input('id_periode');
        $simpan->nama_tagihan=$request->input('nama_tagihan');
        $simpan->jumlah_tagihan=$request->input('jumlah_tagihan');
        $simpan->keterangan=$request->input('keterangan');
        $simpan->status='Belum Lunas';
        $simpan->semester=$request->input('semester');
        $simpan->id_prodi=$request->input('id_prodi');


        $validator = Validator::make($request->all(), [

        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Data Tersimpan !', '');
            return back();

        }
    }

    public function updateTagihan(Request $request, $id){
        //simpan data tagihan per mahasiswa
        $simpan=Pembayaran::find($id);
        $simpan->id_user=$request->input('id_user');
        $simpan->id_periode=$request->input('id_periode');
        $simpan->nama_tagihan=$request->input('nama_tagihan');
        $simpan->jumlah_tagihan=$request->input('jumlah_tagihan');
        $simpan->keterangan=$request->input('keterangan');
        $simpan->status=$request->input('status');
        $simpan->semester=$request->input('semester');
        $simpan->status=$request->input('status');
        $simpan->id_prodi=$request->input('id_prodi');


        $validator = Validator::make($request->all(), [

        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Data Tersimpan !', '');
            return back();

        }
    }
}
