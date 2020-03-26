@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pilih Semester</h3>
        <hr>

        <table id="tabel" class="table table-bordered">
            <thead>
                <th>Semester</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    <td>Semester 1</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '1') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 2</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '2') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 3</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '3') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 4</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '4') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 5</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '5') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 6</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '6') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 7</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '7') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 8</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '8') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 9</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '9') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 10</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '10') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 11</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '11') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 12</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '12') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 13</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '13') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
                <tr>
                    <td>Semester 14</td>
                        <td>
                            {!!Form::open(['action'=>'DaftarPelunasan@listPelunasanPembayaran', 'method'=>'GET'])!!}
                            {{Form::hidden('semester', '14') }}
                            {{Form::submit('Show',['class'=>'btn btn-success btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary btn-block" href="/admin/admin">Kembali Ke Dashboard</a>
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