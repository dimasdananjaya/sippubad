@extends('layouts.app')

@section('content')
    <div class="container">
        <div  class="col-lg-12">
            <h3>Pilih Data Mahasiswa Untuk Melakukan Pembayaran</h3>
            <hr>
            <table id="tabel" class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Angkatan</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($user as $usr)
                <tr>
                    <td></td>
                    <td>{{$usr->nim}}</td>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->prodi}}</td>
                    <td>{{$usr->angkatan}}</td>
                    <td><a href="{{ route('pembayaran.show', $usr->id_user) }}" class="btn btn-primary btn-sm">Detail</a></td>
                 </tr>
                @endforeach
                </tbody>
              </table>
        </div>
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