@extends('layouts.mahasiswa')

@section('content')
<section id="dashboard-mahasiswa">
    <div class="container mt-3">
        <div class="row">
        
        <div class="col-lg-4">
            <div class="card mt-3">
                <div class="card-header">
                    <img class="d-block mx-auto" src="/resources/logo/profile.svg">
                    <h4><b>Identitas Mahasiswa</b></h4>
                </div><!--card-header-->
                <div class="card-body">
                    <p>Nama : {{ Auth::user()->name}}</p>
                    <p>NIM : {{ Auth::user()->nim}}</p>
                    <p>Kelas : {{ Auth::user()->kelas}}</p>
                    @php
                    $prodi=Auth::user()->id_prodi;
                    $kelas=Auth::user()->kelas;
                    $databiaya=DB::select(DB::raw("SELECT * FROM biaya_prodi WHERE id_prodi='$prodi' AND kelas='$kelas'"));
                    $prodi=DB::select(DB::raw("SELECT prodi FROM prodi WHERE id_prodi='$prodi'"));
                    @endphp
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-4-->

        <div class="col-lg-4">
            <div class="card mt-3">
                <div class="card-header">
                    <img class="d-block mx-auto" src="/resources/logo/total-bayar.svg">
                    <h4><b>Total Pembayaran : </b></h4>
                </div>
                <!--card-header-->
                <div class="card-body">
                    <?php
                        $counterSemester=1;
                    ?>
                    <div class="row" id="tagihan">
                        @foreach ($totalPembayaranSemester as $tps)
                            <div class="col-lg-6">
                                <p><b>Semester {{$counterSemester++}} </b> : <br> Rp. {{ number_format($tps->total, 2, ',', '.') }}
                            </div><!--col-6-->
                        @endforeach
                    </div><!--row-->
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-4-->

        <div class="col-lg-4">
            <div class="card mt-3">
                <div class="card-header">
                    <img class="d-block mx-auto" src="/resources/logo/beban-biaya.svg">
                    @foreach($prodi as $prdi)
                        <h4><b>Beban Biaya Prodi {{$prdi->prodi}}</b></h4>
                    @endforeach
                </div><!--card-header-->
                <div class="card-body">
                    <table style="margin-top:20px;" class="table table-bordered table-responsive-sm">
                        <thead>
                            <th>Jenis Biaya</th>
                            <th>Jumlah Biaya</th>
                        </thead>
                        <tbody>
                            @foreach($databiaya as $dbi)
                            <tr>
                                <td>{{$dbi->jenis_biaya}}</td>
                                <td>Rp. {{ number_format($dbi->jumlah_biaya, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-4-->

            <div class="col-lg-12 mt-3">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4><b>Tagihan Pembayaran</b></h4>
                    </div><!--card-header-->
                    <div class="card-body">
                        <table id="tabel-tagihan" class="table table-hover table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id.</th>
                                    <th>Nama Tagihan</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Semester</th>
                                    <th>Keterangan</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tagihan as $tgh)
                                    <tr>
                                        <td></td>
                                        <td>{{$tgh->id_tagihan}}</td>
                                        <td>{{$tgh->nama_tagihan}}</td>
                                        <td>Rp. {{ number_format($tgh->jumlah_tagihan, 2, ',', '.') }}</td>
                                        <td>{{$tgh->semester}}</td>
                                        <td>{{$tgh->keterangan}}</td>
                                        <td>{{$tgh->periode}}</td>
                                        @if ($tgh->status=='Belum Lunas')
                                            <td style="color:red;"><b>{{$tgh->status}}</b></td>
                                        @else
                                            <td style="color:#a2de96;"><b>{{$tgh->status}}</b></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--card-body-->
                </div><!--card-->

                <div class="card mt-4">
                    <div class="card-header">
                        <h4 ><b>Riwayat Pembayaran : </b></h4>
                    </div><!--card-header-->
                    <div class="card-body">
                        <table id="tabel" class="table table-hover table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>No. Referensi</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Semester</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran as $pmbyr)
                                    <tr>
                                    <td></td>
                                    <td>{{$pmbyr->no_referensi}}</td>
                                    <td>{{$pmbyr->nama_pembayaran}}</td>
                                    <td>Rp. {{ number_format($pmbyr->jumlah_bayar, 2, ',', '.') }}</td>
                                    <td>{{$pmbyr->semester}}</td>
                                    <td>{{$pmbyr->keterangan}}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--card-body-->
                </div><!--card-->
                    
            </div><!--end col-->
        </div><!--row-->
    </div><!--container-->
</section>

    <script type="text/javascript">
        $(document).ready(function() {
            var t = $('#tabel').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );

        
        $(document).ready(function() {
            var t = $('#tabel-tagihan').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );

        jQuery("#tagihan-pembayaran").click(function(){
            jQuery("#tagihan-pembayaran").toggle();
        });

    </script>
@endsection