@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="mt-3 card">
        <div class="card-header">
            <h3>History Seluruh Pembayaran</h3>
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
                        <th>Periode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapPembayaran as $rekap)
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
                        <td>{{$rekap->periode}}</td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--card-body-->
    </div><!--card-->
</div><!--container-fluid-->

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