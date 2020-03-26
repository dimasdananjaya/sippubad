<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Periode;
use App\User;
use DB;
use Hash;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProdi=Prodi::all();
        $dataPeriode=Periode::all();
        $dataUser = DB::table('users')
            ->join('prodi', 'users.id_prodi', '=', 'prodi.id_prodi')
            ->select('users.*', 'prodi.prodi')
            ->get();

        return view('admin.registrasi')->with('user',$dataUser)->with('prodi',$dataProdi)->with('periode',$dataPeriode);
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
        $simpan=new User;
        $simpan->name=$request->input('name');
        $simpan->nim=$request->input('nim');
        $simpan->acs=$request->input('acs');
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->angkatan=$request->input('angkatan');
        $simpan->kelas=$request->input('kelas');
        $simpan->status_perkuliahan='aktif';
        
        $password=$request->input('nim');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('nim');
        $validator = Validator::make($request->all(), [
            'nim' => ['required', 'string', 'max:255', 'unique:users'],
        ]);



        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'NIM Telah Terdaftar !');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Success !', '');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataUser=User::find($id);
        $dataProdi=Prodi::all();
        $dataPeriode=Periode::all();
        return view('admin.admin-edit-user')->with('user',$dataUser)->with('prodi',$dataProdi)->with('periode',$dataPeriode);
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
        $simpan=User::find($id);
        $simpan->name=$request->input('name');
        $simpan->nim=$request->input('nim');
        $simpan->id_prodi=$request->input('id_prodi');
        $simpan->angkatan=$request->input('angkatan');
        $simpan->kelas=$request->input('kelas');
        $simpan->status_perkuliahan=$request->input('status_perkuliahan');
        
        $password=$request->input('nim');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('nim');

        $simpan->save();
        alert()->success('Success !', '');
        return back();
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
}
