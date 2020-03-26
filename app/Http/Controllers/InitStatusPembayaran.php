<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InitStatusPembayaran extends Controller
{
    public function initStatusPembayaran(Request $request){
        $id_user=$request->input('id_user');
        $user=DB::select(DB::raw("SELECT * FROM users WHERE id_user='$id_user'"));

        DB::select(DB::raw("INSERT INTO  status_pembayaran(
            id_user,
            status,
            semester
        )
        VALUES
            ('$id_user','Belum_Lunas','1'),
            ('$id_user','Belum_Lunas','2'),
            ('$id_user','Belum_Lunas','3'),
            ('$id_user','Belum_Lunas','4'),
            ('$id_user','Belum_Lunas','5'),
            ('$id_user','Belum_Lunas','6'),
            ('$id_user','Belum_Lunas','7'),
            ('$id_user','Belum_Lunas','8'),
            ('$id_user','Belum_Lunas','9'),
            ('$id_user','Belum_Lunas','10'),
            ('$id_user','Belum_Lunas','11'),
            ('$id_user','Belum_Lunas','12'),
            ('$id_user','Belum_Lunas','13'),
            ('$id_user','Belum_Lunas','14')
            "));

            DB::select(DB::raw("UPDATE users SET init_status='yes' WHERE id_user='$id_user'"));

            alert()->success('Initialize Status Pembayaran Berhasil !', '');
            return back();
    }
}
