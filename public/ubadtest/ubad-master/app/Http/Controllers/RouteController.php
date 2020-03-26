<?php

namespace App\Http\Controllers;

class RouteController extends Controller
{
    //HALAMAN PROGRAM STUDI
    public function teknologiPanganPage()
    {
        return view('pages/prodi/teknologi-pangan');
    }

    public function teknikBiomedisPage()
    {
        return view('pages/prodi/teknik-biomedis');
    }

    public function psikologiPage()
    {
        return view('pages/prodi/psikologi');
    }

    public function giziPage()
    {
        return view('pages/prodi/gizi');
    }

    public function farmasiPage()
    {
        return view('pages/prodi/farmasi');
    }

    public function akuntansiPage()
    {
        return view('pages/prodi/akuntansi');
    }

    public function hubunganMasyarakatPage()
    {
        return view('pages/prodi/hubungan-masyarakat');
    }

    public function bahasaInggrisPage()
    {
        return view('pages/prodi/bahasa-inggris');
    }

    public function hukumPage()
    {
        return view('pages/prodi/hukum');
    }

    public function sistemInformasiPage()
    {
        return view('pages/prodi/sistem-informasi');
    }

    public function tentangUbadPage()
    {
        return view('pages/profil/tentang-ubad');
    }

    public function visiMisiPage()
    {
        return view('pages/profil/visi-misi');
    }

    public function mahasiswaBaruPage()
    {
        return view('pages/pendaftaran/mahasiswa-baru');
    }

    public function seleksiOnlinePage()
    {
        return view('pages/pendaftaran/seleksi-online');
    }


    //HALAMAN PROFIL STAFF
    public function staffPage(){
        return view('pages.profil.staff');
    }
}
