@extends('layouts.app')

@section('content')
    <div style="margin-top:20px;" class="container-fluid">
        <div class="row">
        
        <div class="col-lg-4">
            <div class="card" style="padding:10px 10px 10px 10px; margin-bottom:20px;">
                <h5>{{ Auth::user()->name}}</h5>
                <hr>
                <p>NIM : {{ Auth::user()->nim}}</p>
                <p>Kelas : {{ Auth::user()->kelas}}</p>
                @php
                $prodi=Auth::user()->id_prodi;
                $kelas=Auth::user()->kelas;
                $databiaya=DB::select(DB::raw("SELECT * FROM biaya_prodi WHERE id_prodi='$prodi' AND kelas='$kelas'"));
                $prodi=DB::select(DB::raw("SELECT prodi FROM prodi WHERE id_prodi='$prodi'"));
                @endphp
                @foreach($prodi as $prdi)
                    <h5 style="margin-top:20px;">Beban Biaya Prodi {{$prdi->prodi}}</h5>
                    <hr>
                @endforeach
                <table style="margin-top:20px;" class="table table-bordered">
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
            </div>
            <div class="card" style="padding: 10px 10px 10px 10px;">
                <h4>Total Pembayaran : </h4>
                
                <hr>
                @foreach ($s1 as $totals1)
                    <p>Semester 1 : Rp. {{ number_format($totals1->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts1 as $ss1) || Status : {{$ss1->status}} @endforeach</p>
                @endforeach
                @foreach ($s2 as $totals2)
                    <p>Semester 2 : Rp. {{ number_format($totals2->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts2 as $ss2) || Status : {{$ss2->status}} @endforeach</p>
                @endforeach
                @foreach ($s3 as $totals3)
                    <p>Semester 3 : Rp. {{ number_format($totals3->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts3 as $ss3) || Status : {{$ss3->status}} @endforeach</p>
                @endforeach
                @foreach ($s4 as $totals4)
                    <p>Semester 4 : Rp. {{ number_format($totals4->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts4 as $ss4) || Status : {{$ss4->status}} @endforeach</p>
                @endforeach
                @foreach ($s5 as $totals5)
                    <p>Semester 5 : Rp. {{ number_format($totals5->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts5 as $ss5) || Status : {{$ss5->status}} @endforeach</p>
                @endforeach  
                @foreach ($s6 as $totals6)
                    <p>Semester 6 : Rp. {{ number_format($totals6->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts6 as $ss6) || Status : {{$ss6->status}} @endforeach</p>
                @endforeach  
                 @foreach ($s7 as $totals7)
                    <p>Semester 7 : Rp. {{ number_format($totals7->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts7 as $ss7) || Status : {{$ss7->status}} @endforeach</p>
                @endforeach  
                @foreach ($s8 as $totals8)
                    <p>Semester 8 : Rp. {{ number_format($totals8->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts8 as $ss8) || Status : {{$ss8->status}} @endforeach</p>
                @endforeach
                
                @foreach ($s9 as $totals9)
                    <p>Semester 9 : Rp. {{ number_format($totals9->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts9 as $ss9) || Status : {{$ss9->status}} @endforeach</p>
                @endforeach

                @foreach ($s10 as $totals10)
                    <p>Semester 10 : Rp. {{ number_format($totals10->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts10 as $ss10) || Status : {{$ss10->status}} @endforeach</p>
                @endforeach

                @foreach ($s11 as $totals11)
                    <p>Semester 11 : Rp. {{ number_format($totals11->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts11 as $ss11) || Status : {{$ss11->status}} @endforeach</p>
                @endforeach

                @foreach ($s12 as $totals12)
                    <p>Semester 12 : Rp. {{ number_format($totals12->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts12 as $ss12) || Status : {{$ss12->status}} @endforeach</p>
                @endforeach

                @foreach ($s13 as $totals13)
                    <p>Semester 13 : Rp. {{ number_format($totals13->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts13 as $ss13) || Status : {{$ss13->status}} @endforeach</p>
                @endforeach
                
                @foreach ($s14 as $totals14)
                    <p>Semester 14 : Rp. {{ number_format($totals14->total, 2, ',', '.') }}
                    <br>
                    @foreach ($sts14 as $ss14) || Status : {{$ss14->status}} @endforeach</p>
                @endforeach
            </div>
        </div>

            <div class="col-lg-8">
                <h4>Riwayat Pembayaran : </h4>
                <table id="tabel" class="table table-hover table-bordered">
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
            </div>
        </div><!--row-->
    </div><!--container-->

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
    </script>
    </div><!--container-->
@endsection