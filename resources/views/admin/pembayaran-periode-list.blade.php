@extends('layouts.app')

@section('content')
<div style="margin-top:20px;" class="container-fluid">
    @foreach ($periode as $prd)
    <h3>Rekap Seluruh Pembayaran Mahasiswa Ubad Periode : {{$prd->periode}}</h3>
    @endforeach
    
    <hr>
    <div class="row">
        <div class="col-lg-3">
            <div style="padding:10px 10px 10px 10px;" class="card">
                @foreach($totalPembayaranPeriode as $total)
                <h4 class="text-center">Total Pembayaran : <br><br>Rp. {{ number_format($total->total, 2, ',', '.') }}
                @endforeach
            </div>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-header">
        </div><!--card-header-->
        <div class="card-body">
            <table id="tabel" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>No. Referensi</th>
                        <th>Nama Pembayaran</th>
                        <th>Jumlah Bayar</th>
                        <th>Semester</th>
                        <th>Validated By</th>
                        <th>Tipe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPembayaranPeriode as $rekap)
                        <tr>
                        <td></td>
                        <td>{{$rekap->nim}}</td>
                        <td>{{$rekap->name}}</td>
                        <td>{{$rekap->prodi}}</td>
                        <td>{{$rekap->no_referensi}}</td>
                        <td>{{$rekap->nama_pembayaran}}</td>
                        <td>Rp. {{ number_format($rekap->jumlah_bayar, 2, ',', '.') }}</td>
                        <td>{{$rekap->semester}}</td>
                        <td>{{$rekap->validated_by}}</td>
                        <td>{{$rekap->tipe}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('admin_dashboard')}}" class="btn btn-primary btn-block mt-3">Kembali Ke Halaman Admin</a>
        </div><!--card-body-->
    </div><!--card-->
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
@endsection