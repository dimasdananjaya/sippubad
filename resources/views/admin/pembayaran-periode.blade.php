@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pilih Periode Pembayaran</h3>
        <hr>
        <table class="table table-bordered" id="tabel">
            <thead>
                <th>No.</th>
                <th>Periode</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($dataPeriode as $periode)
                <tr>
                    <td></td>
                    <td>{{$periode->periode}}</td>
                    <td>
                        {!!Form::open(['action'=>'RekapPembayaranPeriode@listPembayaranPeriode', 'method'=>'GET'])!!}
                        {{Form::hidden('id_periode', $periode->id_periode) }}
                        {{Form::submit('Pilih',['class'=>'btn btn-success btn-sm'])}}
                        {!!Form::close()!!}
                    </td>  

                </tr>
                @endforeach
            </tbody>
        </table>

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