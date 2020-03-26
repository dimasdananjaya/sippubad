@extends('layouts.app')

@section('content')
<section id="admin-dashboard">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top mx-auto" src="/resources/logo/money.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Pembayaran</h5>
                  <p class="card-text">Kelola Pembayaran Mahasiswa</p>
                  <a href="/admin/pembayaran" class="btn btn-primary btn-block">Pilih</a>
                </div>
            </div>
        </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/invoice.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Biaya Prodi</h5>
                      <p class="card-text">Kelola Biaya Prodi</p>
                      <a href="/admin/biaya_prodi" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/calendar.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Periode</h5>
                      <p class="card-text">Kelola Data Periode</p>
                      <a href="/admin/periode" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/graphic.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center">Rekap Seluruh Pembayaran</h5>
                      <p class="card-text"></p>
                      <a href="/admin/rekap-pembayaran" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/business-and-finance.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center">Rekap Pembayaran Per-Periode</h5>
                      <p class="card-text"></p>
                      <a href="/admin/pembayaran-periode" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/team.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center">Kelola Data Pengguna Mahasiswa</h5>
                      <p class="card-text"></p>
                      <a href="/admin/user" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <img class="card-img-top mx-auto" src="/resources/logo/money1.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center">Daftar Pelunasan Pembayaran</h5>
                      <p class="card-text"></p>
                      <a href="/admin/pelunasan-pembayaran" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>
@endsection
