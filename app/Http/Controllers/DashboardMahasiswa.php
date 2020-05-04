<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Periode;
use App\User;
use App\Tagihan;
use DB;
use Auth;
use Hash;


class DashboardMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id_user;
        $dataUser=DB::select(DB::raw("SELECT * FROM users WHERE id_user='$id_user'"));
        $dataPeriode=Periode::all();
        $dataPembayaran=DB::select(DB::raw("SELECT * FROM pembayaran WHERE id_user='$id_user'"));
        $dataTagihan=DB::table('tagihan')
        ->join('periode', 'periode.id_periode', '=', 'tagihan.id_periode')
        ->select('tagihan.*', 'periode.periode')
        ->where('id_user',$id_user)
        ->get();

        $dataPembayaranSemester1=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='1'"));
        $dataPembayaranSemester2=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='2'"));
        $dataPembayaranSemester3=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='3'"));
        $dataPembayaranSemester4=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='4'"));
        $dataPembayaranSemester5=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='5'"));
        $dataPembayaranSemester6=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='6'"));
        $dataPembayaranSemester7=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='7'"));
        $dataPembayaranSemester8=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='8'"));
        $dataPembayaranSemester9=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='9'"));
        $dataPembayaranSemester10=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='10'"));
        $dataPembayaranSemester11=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='11'"));
        $dataPembayaranSemester12=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='12'"));
        $dataPembayaranSemester13=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='13'"));
        $dataPembayaranSemester14=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' and semester='14'"));

        $dataStatusPembayaran1=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='1'"));
        $dataStatusPembayaran2=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='2'"));
        $dataStatusPembayaran3=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='3'"));
        $dataStatusPembayaran4=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='4'"));
        $dataStatusPembayaran5=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='5'"));
        $dataStatusPembayaran6=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='6'"));
        $dataStatusPembayaran7=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='7'"));
        $dataStatusPembayaran8=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='8'"));
        $dataStatusPembayaran9=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='9'"));
        $dataStatusPembayaran10=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='10'"));
        $dataStatusPembayaran11=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='11'"));
        $dataStatusPembayaran12=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='12'"));
        $dataStatusPembayaran13=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='13'"));
        $dataStatusPembayaran14=DB::select(DB::raw("SELECT status FROM status_pembayaran WHERE id_user='$id_user' and semester='14'"));

        return view('mahasiswa.mahasiswa-dashboard')
        ->with('user',$dataUser)
        ->with('periode',$dataPeriode)
        ->with('pembayaran',$dataPembayaran)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mahasiswaUpdateProfil(Request $request){
        $id_user = Auth::user()->id_user;
        $simpan=User::find($id_user);

        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('password');

        $simpan->save();
        alert()->success('Success !', '');
        return back();
    }

    public function mahasiswaEditProfilPage()
    {
        return view('mahasiswa.mahasiswa-edit-profil');
    }
}
