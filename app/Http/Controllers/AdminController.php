<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Periode;
use App\Prodi;
use DB;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

/*
    public function registrasi()
    {
        $dataProdi=Prodi::all();
        $dataUser = DB::table('users')
            ->join('prodi', 'users.id_prodi', '=', 'prodi.id_prodi')
            ->select('users.*', 'prodi.prodi')
            ->get();
        /*$nama_prodi=collect([]);

       foreach($dataUser as $prodiUser)
        {
           $nama_prodi->push(DB::select( DB::raw("SELECT prodi FROM prodi
           WHERE id_prodi = $prodiUser->id_prodi"))); 
        }
        $nama_prodi = $nama_prodi->flatten();
        

        return view('admin.registrasi')->with('user',$dataUser)->with('prodi',$dataProdi);
    }
*/

    public function editProfilPage()
    {
        return view('admin.admin-edit-profil');
    }

    public function adminUpdateProfil(Request $request){
        $id_user = Auth::user()->id_user;
        $simpan=User::find($id_user);

        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('password');

        $simpan->save();
        alert()->success('Success !', '');
        return back();
    }

    public function periodePage()
    {
        $dataPeriode=Periode::all();
        return view('admin.admin-periode');
    }


}
