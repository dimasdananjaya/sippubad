@extends('layouts.app')

@section('content')
<section id="rekap-tagihan">
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header">
                <h4><b>Rekapitulasi Tagihan Pembayaran</b></h4>
            </div><!--card-heder-->
            <div class="card-body">
                <table id="tabel" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Nama Tagihan</th>
                            <th>Jumlah</th>
                            <th>Periode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekapTagihan as $rt)
                            <tr>
                                <td></td>
                                <td>{{$rt->name}}</td>
                                <td>{{$rt->nim}}</td>
                                <td>{{$rt->prodi}}</td>
                                <td>{{$rt->nama_tagihan}}</td>
                                <td>Rp. {{ number_format($rt->jumlah_tagihan, 2, ',', '.') }}</td>
                                <td>{{$rt->periode}}</td>
                                @if ($rt->status=='Belum Lunas')
                                    <td style="color: red;">{{$rt->status}}</td>
                                @else
                                    <td style="color: #006a71;">{{$rt->status}}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('admin_dashboard')}}" class="btn btn-primary btn-block mt-4">Kembali Ke Halaman Admin</a>
            </div><!--card-body-->
        </div><!--card-->
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
</script>
@endsection