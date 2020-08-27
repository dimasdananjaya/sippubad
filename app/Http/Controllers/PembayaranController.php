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
use App\Tagihan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data user untuk ditampilkan pada menu awal pembayaran
        $dataUser= DB::table('users')
        ->join('prodi', 'users.id_prodi', '=', 'prodi.id_prodi')
        ->select('users.*', 'prodi.prodi')
        ->where('users.status_perkuliahan','aktif')
        ->get();
        $dataProdi=Prodi::all();
        $dataPeriode=Periode::all();

        return view('admin.admin-pembayaran')->with('user',$dataUser)->with('prodi',$dataProdi)->with('periode',$dataPeriode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //simpan data pembayaran per mahasiswa
        $simpan=new Pembayaran;
        $simpan->id_user=$request->input('id_user');
        $simpan->id_periode=$request->input('id_periode');   
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->id_tagihan=$request->input('id_tagihan');
        $simpan->no_referensi=$request->input('no_referensi');
        $simpan->jumlah_bayar=$request->input('jumlah_bayar');
        $simpan->semester=$request->input('semester');
        $simpan->validated_by=$request->input('validated_by');
        $simpan->keterangan=$request->input('keterangan');
        $simpan->nama_pembayaran=$request->input('nama_pembayaran');
        $simpan->tipe=$request->input('tipe');       

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //tampilkan history pembayaran per mahasiswa di menu pembayaran
        $dataUser=DB::select(DB::raw("SELECT * FROM users WHERE id_user='$id'"));
        $dataPeriode=Periode::all();

        $dataPembayaran= DB::table('pembayaran')
        ->join('periode', 'periode.id_periode', '=', 'pembayaran.id_periode')
        ->select('pembayaran.*', 'periode.periode')
        ->where('id_user',$id)
        ->get();

        $dataTagihan=DB::table('tagihan')
        ->join('periode', 'periode.id_periode', '=', 'tagihan.id_periode')
        ->select('tagihan.*', 'periode.periode')
        ->where('id_user',$id)
        ->get();

        $dataTagihanUntukDibayar=DB::select(DB::raw("SELECT * FROM tagihan WHERE id_user='$id' AND status='Belum Lunas'"));

        $totalTagihanUntukDibayar=DB::select(DB::raw("SELECT * FROM tagihan WHERE id_user='$id' AND status='Belum Lunas'"));
        $totalPembayaranSemester=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' group by semester asc"));

        return view('admin.admin-pembayaran-tambah')
        ->with('user',$dataUser)
        ->with('periode',$dataPeriode)
        ->with('pembayaran',$dataPembayaran)
        ->with('tagihan',$dataTagihan)
        ->with('totalPembayaranSemester',$totalPembayaranSemester)
        ->with('dataTagihanUntukDibayar',$dataTagihanUntukDibayar);
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
        //update pembayaran mahasiswa di menu pembayaran
        $simpan=Pembayaran::find($id);
        $simpan->id_user=$request->input('id_user');
        $simpan->id_periode=$request->input('id_periode');   
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->id_tagihan=$request->input('id_tagihan');
        $simpan->no_referensi=$request->input('no_referensi');
        $simpan->jumlah_bayar=$request->input('jumlah_bayar');
        $simpan->nama_pembayaran=$request->input('nama_pembayaran');
        $simpan->semester=$request->input('semester');
        $simpan->validated_by=$request->input('validated_by');
        $simpan->keterangan=$request->input('keterangan');
        $simpan->tipe=$request->input('tipe');      

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pembayaran')->where('id_pembayaran', '=', $id)->delete();
        alert()->success('Data Terhapus !', '');
        return back();
    }

}
