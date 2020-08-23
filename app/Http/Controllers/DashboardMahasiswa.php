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

        $totalPembayaranSemester=DB::select(DB::raw("SELECT SUM(jumlah_bayar) AS total FROM pembayaran WHERE id_user='$id_user' group by semester asc"));

        return view('mahasiswa.mahasiswa-dashboard')
        ->with('user',$dataUser)
        ->with('periode',$dataPeriode)
        ->with('pembayaran',$dataPembayaran)
        ->with('tagihan',$dataTagihan)
        ->with('totalPembayaranSemester',$totalPembayaranSemester);
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
