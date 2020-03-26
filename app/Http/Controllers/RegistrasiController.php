<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;
use Validator;
use Alert;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        
        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('password');

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