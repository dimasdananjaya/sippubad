@extends('layouts.app')

@section('content')
<section id="admin-dashboard">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top mx-auto" src="/resources/logo/pembayaran.svg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><b>Pembayaran</b></h5>
                  <p class="card-text">Kelola Pembayaran Mahasiswa</p>
                  <a href="/admin/pembayaran" class="btn btn-primary btn-block">Pilih</a>
                </div>
            </div>
        </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/biaya-prodi.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>Biaya Prodi</b></h5>
                      <p class="card-text">Kelola Biaya Prodi</p>
                      <a href="/admin/biaya_prodi" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/periode.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>Periode</b></h5>
                      <p class="card-text">Kelola Data Periode</p>
                      <a href="/admin/periode" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/rekap-seluruh.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>History Pembayaran</b></h5>
                      <p class="card-text">Lihat seluruh pembayaran</p>
                      <a href="/admin/rekap-pembayaran" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/rekap-periode.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>History Pembayaran Per-Periode</b></h5>
                      <p class="card-text">Lihat history pembayaran per-periode</p>
                      <a href="/admin/pembayaran-periode" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/pengguna.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>Kelola Data Pengguna Sistem</b></h5>
                      <p class="card-text">Kelola seluruh data pengguna sistem</p>
                      <a href="/admin/user" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/rekap-tagihan.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Rekap Tagihan</b></h5>
                      <p class="card-text text-center">Lihat Rekapitulasi Tagihan</p>
                      <a href="/admin/rekap-tagihan" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>
 
    </div><!--row-->
</div><!--container-->
</section>
@endsection
