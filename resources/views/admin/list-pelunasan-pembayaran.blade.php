<!-------------------------- this monstrosity are not used anymore -->
@extends('layouts.app')

@section('content')
<div class="container">
<h3>Daftar Pelunasan Semester {{$semester}}</h3>
    <hr>
    
    <table id="tabel" class="table table-bordered">
        <thead>
            <th>No.</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Prodi</th>
        </thead>
        <tbody>
            @foreach ($dataPelunasan as $dp)
            <?php
                
                $prodi=DB::select(DB::raw("SELECT prodi FROM prodi WHERE id_prodi='$dp->id_prodi'"));
            ?>
            <tr>
                <td></td>
                <td>{{$dp->name}}</td>
                <td>{{$dp->status}}</td>
                @foreach($prodi as $prd)
                <td>{{$prd->prodi}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary btn-block" href="/admin/pelunasan-pembayaran">Kembali</a>
</div>

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