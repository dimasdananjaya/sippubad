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
        //$dataPembayaran=DB::select(DB::raw("SELECT * FROM pembayaran WHERE id_user='$id'"));

        $dataPembayaran= DB::table('pembayaran')
        ->join('periode', 'periode.id_periode', '=', 'pembayaran.id_periode')
        ->select('pembayaran.*', 'periode.periode')
        ->where('id_user',$id)
        ->get();
        $dataStatusPembayaran=DB::select(DB::raw("SELECT * FROM status_pembayaran WHERE id_user='$id'"));
        $dataTagihan=DB::table('tagihan')
        ->join('periode', 'periode.id_periode', '=', 'tagihan.id_periode')
        ->select('tagihan.*', 'periode.periode')
        ->where('id_user',$id)
        ->get();

        $dataPembayaranSemester1=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='1'"));
        $dataPembayaranSemester2=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='2'"));
        $dataPembayaranSemester3=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='3'"));
        $dataPembayaranSemester4=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='4'"));
        $dataPembayaranSemester5=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='5'"));
        $dataPembayaranSemester6=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='6'"));
        $dataPembayaranSemester7=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='7'"));
        $dataPembayaranSemester8=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='8'"));
        $dataPembayaranSemester9=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='9'"));
        $dataPembayaranSemester10=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='10'"));
        $dataPembayaranSemester11=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='11'"));
        $dataPembayaranSemester12=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='12'"));
        $dataPembayaranSemester13=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='13'"));
        $dataPembayaranSemester14=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id' and semester='14'"));

        $dataStatusPembayaran1=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='1'"));
        $dataStatusPembayaran2=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='2'"));
        $dataStatusPembayaran3=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='3'"));
        $dataStatusPembayaran4=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='4'"));
        $dataStatusPembayaran5=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='5'"));
        $dataStatusPembayaran6=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='6'"));
        $dataStatusPembayaran7=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='7'"));
        $dataStatusPembayaran8=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='8'"));
        $dataStatusPembayaran9=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='9'"));
        $dataStatusPembayaran10=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='10'"));
        $dataStatusPembayaran11=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='11'"));
        $dataStatusPembayaran12=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='12'"));
        $dataStatusPembayaran13=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='13'"));
        $dataStatusPembayaran14=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id' and semester='14'"));


        return view('admin.admin-pembayaran-tambah')
        ->with('user',$dataUser)
        ->with('periode',$dataPeriode)
        ->with('pembayaran',$dataPembayaran)
        ->with('status_pembayaran',$dataStatusPembayaran)
        ->with('tagihan',$dataTagihan)
        ->with('s1',$dataPembayaranSemester1)
        ->with('s2',$dataPembayaranSemester2)
        ->with('s3',$dataPembayaranSemester3)
        ->with('s4',$dataPembayaranSemester4)
        ->with('s5',$dataPembayaranSemester5)
        ->with('s6',$dataPembayaranSemester6)
        ->with('s7',$dataPembayaranSemester7)
        ->with('s8',$dataPembayaranSemester8)
        ->with('s9',$dataPembayaranSemester9)
        ->with('s10',$dataPembayaranSemester10)
        ->with('s11',$dataPembayaranSemester11)
        ->with('s12',$dataPembayaranSemester12)
        ->with('s13',$dataPembayaranSemester13)
        ->with('s14',$dataPembayaranSemester14)
        ->with('sts1',$dataStatusPembayaran1)
        ->with('sts2',$dataStatusPembayaran2)
        ->with('sts3',$dataStatusPembayaran3)
        ->with('sts4',$dataStatusPembayaran4)
        ->with('sts5',$dataStatusPembayaran5)
        ->with('sts6',$dataStatusPembayaran6)
        ->with('sts7',$dataStatusPembayaran7)
        ->with('sts8',$dataStatusPembayaran8)
        ->with('sts9',$dataStatusPembayaran9)
        ->with('sts10',$dataStatusPembayaran10)
        ->with('sts11',$dataStatusPembayaran11)
        ->with('sts12',$dataStatusPembayaran12)
        ->with('sts13',$dataStatusPembayaran13)
        ->with('sts14',$dataStatusPembayaran14);
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

    public function statusPembayaran(Request $request)
    {
        $simpan=new StatusPembayaran;
        $simpan->id_user=$request->input('id_user');
        $simpan->status=$request->input('status');
        $simpan->semester=$request->input('semester');
        $simpan->validated_by=$request->input('validated_by');   

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

    public function StatusPembayaranUpdate(Request $request)
    {
        $id_status_pembayaran=$request->input('id_status_pembayaran');
        $status=$request->input('status');
        $semester=$request->input('semester');
        $validated_by=$request->input('validated_by');
   
        $update=DB::select(DB::raw("UPDATE status_pembayaran SET status='$status', semester='$semester', validated_by='$validated_by' 
        WHERE id_status_pembayaran='$id_status_pembayaran'"));
        alert()->success('Data Terupdate !', '');
        return back();

    }


}
