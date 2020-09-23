@extends('layouts.app')

@section('content')
    <section id="404" class="mt-4 mb-3">
        <h2 class="text-center">Whoops, Halaman Tidak Ditemukan</h2>
        <p class="text-center">Mungkin anda salah link</p>
        @if(Auth::user()->acs === '1')
        <p class="text-center"><br><a href="/admin/dashboard" class="btn btn-primary mx-auto text-center">Kembali ke Halaman Utama</a></p>
        @elseif(Auth::user()->acs === '2')
        <p class="text-center"><br><a href="/mahasiswa/dashboard" class="btn btn-primary mx-auto text-center">Kembali ke Halaman Utama</a></p>
        @endif
        <img style="width: 30em; height:30em;" src="/resources/logo/404.svg" class="mx-auto d-block">
    </section>
@endsection