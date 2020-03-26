<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Periode;
use App\User;
use DB;
use Validator;
use App\Biaya_Prodi;

class BiayaProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProdi=Prodi::all();
        $dataBiayaProdi = DB::table('biaya_prodi')
            ->join('prodi', 'biaya_prodi.id_prodi', '=', 'prodi.id_prodi')
            ->select('biaya_prodi.*', 'prodi.prodi')
            ->get();
        return view('admin.admin-biaya-prodi')->with('biaya_prodi',$dataBiayaProdi)->with('prodi',$dataProdi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan=new Biaya_Prodi;
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->jumlah_biaya=$request->input('jumlah_biaya');   
        $simpan->jenis_biaya=$request->input('jenis_biaya');
        $simpan->kelas=$request->input('kelas');      

        $validator = Validator::make($request->all(), [

        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Jenis Biaya Telah Terdaftar !');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Data Tersimpan !', '');
            return back();

        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $simpan=Biaya_Prodi::find($id);
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->jumlah_biaya=$request->input('jumlah_biaya');   
        $simpan->jenis_biaya=$request->input('jenis_biaya');
        $simpan->kelas=$request->input('kelas');     
        
        $validator = Validator::make($request->all(), [

            ]);
        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Jenis Biaya Telah Terdaftar !');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Data Diupdate !', '');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('biaya_prodi')->where('id_biaya', '=', $id)->delete();
        alert()->success('Data Terhapus !', '');
        return back();
    }
}
