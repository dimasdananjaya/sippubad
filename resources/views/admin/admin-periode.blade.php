@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Tambah Periode</div>

                <div class="card-body">
                    {!!Form::open(['action'=>'PeriodeController@store', 'method'=>'POST'])!!}
                    {{Form::text('periode','',['class'=>'form-control form-group','placeholder'=>'Periode','required'])}}
                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:20px;">
            <h2>Tabel Periode</h2>
            <hr>
            <table id="tabel" class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th scope="col">Periode</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($periode as $prd)
                <tr>
                    <td></td>
                    <td>{{$prd->periode}}</td>
                    <td>
                        <a class="btn btn-success" style="color:#fff;float:left; margin-right:20px;" data-toggle="modal" data-target="#periode-edit-modal{{$prd->id_periode}}">Edit</a>
                        {!!Form::open(['action'=>['PeriodeController@destroy', $prd->id_periode], 'method'=>'POST','id'=>'form-delete-periode'.$prd->id_periode])!!}
                            {{Form::hidden('_method', 'DELETE')}}                                              
                            {{Form::submit('Hapus',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                        <script>
                                document.querySelector('#form-delete-periode{{$prd->id_periode}}').addEventListener('click', function(e){
                                var form =this;
                               
                                swal({
                                title: 'Hapus data yang dipilih?',
                                text: "Klik Hapus untuk menghapus data !",
                                type: 'warning',
                                buttons:{
                                    cancel:"Batal",
                                    confirm:{
                                        text:"Hapus",
                                        value:"catch",
                                    }
                                }
                                }).then((value) => {
                                switch(value){
                                    case "catch":
                                    form.submit();
                                    break;
                            
                                    default:
                                
                                        break;
                                }
                                })
                            });
                            
                        </script>
                    </td>
                 </tr>
                <!-- Modal Edit Periode-->
                <div class="modal fade" id="periode-edit-modal{{$prd->id_periode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Edit Periode</h2>   
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                  
                                {!!Form::open(['action'=>['PeriodeController@update', $prd->id_periode], 'method'=>'PUT'])!!}
                                    {{Form::label('periode','Periode :')}}
                                    {{Form::text('periode',$prd->periode,['class'=>'form-control form-group','placeholder'=>'Periode'])}}
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Update',['class'=>'btn btn-success btn-block'])}}
                                {!!Form::close()!!}
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
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