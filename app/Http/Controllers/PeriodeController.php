<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use DB;
use Alert;
use Validator;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPeriode=Periode::all();
        return view('admin.admin-periode')->with('periode',$dataPeriode);
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
        $simpan=new Periode;
        $simpan->periode=$request->input('periode');   

        $validator = Validator::make($request->all(), [
            'periode' => ['required', 'string', 'max:255', 'unique:periode'],
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Periode Telah Terdaftar !');
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
        $simpan=Periode::find($id);
        $simpan->periode=$request->input('periode');   
        
        $validator = Validator::make($request->all(), [
            'periode' => 'required|unique:periode,periode,'.$simpan->id_periode.',id_periode'
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Periode Telah Terdaftar !');
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
        DB::table('periode')->where('id_periode', '=', $id)->delete();
        alert()->success('Data Terhapus !', '');
        return back();
        
        
    }
}
