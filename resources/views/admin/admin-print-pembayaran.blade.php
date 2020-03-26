@extends('layouts.app')

@section('content')
<section id="print-pembayaran">
    <div id="print-area">
    <div class="container">
        <div class="card border border-dark">
            <div class="row">
                <div class="col-lg-12">
                    <p><img src="/resources/logo/balidwipa.png"
                        class="navbar-logo" />Universitas Bali Dwipa
                    </p>
                </div>
                <div class="col-6">
                    <b>
                        Referensi :
                        @foreach ($dataPembayaran as $pmbyr)
                        <p>{{$pmbyr->no_referensi}}</p>
                        @endforeach
                    </b>
                </div>
                <div class="col-6">
                    <b>
                        Tanggal & Waktu Pembayaran :
                        @foreach ($dataPembayaran as $pmbyr)
                        <p>{{$pmbyr->created_at}}</p>
                        @endforeach
                    </b>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-6">
                    @foreach ($dataPembayaran as $pmbyr)
                    <p>Nama : {{$pmbyr->name}}</p>
                    <p>Prodi : {{$pmbyr->prodi}}</p>
                    @foreach ($dataKelas as $dk)
                    @if($dk->kelas == 'reguler')
                    <p>Kelas : Reguler</p>
                    @else
                    <p>Kelas : Karyawan</p>
                    @endif   
                    @endforeach
                    @endforeach
                </div>

                <div class="col-lg-12">
                    <hr>
                </div>
                
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Pembayaran</th>
                            <th>Jumlah Bayar</th>
                            <th>Semester</th>
                        </thead>
                        <tbody>
                            <td>{{$pmbyr->nama_pembayaran}}</td>
                            <td>Rp. {{ number_format($pmbyr->jumlah_bayar, 2, ',', '.') }}</td>
                            <td>{{$pmbyr->semester}}</td>
                        </tbody>           
                    </table>
                </div>

                <div class="col-lg-6">
                    <p>TTD, Admin Pembayaran</p>
                    <br>
                    <br>
                    <br>
                    <p>{{ Auth::user()->name }}</p>
                    <br>
                    <br>
                    <p>(...............................................)</p>
                </div>
            </div>
        </div>
        <button style="margin-top:20px;" class="btn btn-block btn-primary" onclick="window.print();">Print</button>
    </div><!--end container-->
    </div>
</section>
@endsection