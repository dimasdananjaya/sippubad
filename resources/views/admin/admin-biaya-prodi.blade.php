@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div style="margin-top:20px;" class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Tambah Biaya Prodi</div>

                <div class="card-body">
                {!!Form::open(['action'=>'BiayaProdiController@store', 'method'=>'POST'])!!}
                    {{Form::label('Prodi','Prodi :')}}
                    <select id="id_prodi" name="id_prodi" class="form-control form-group">
                        @foreach($prodi as $prd)
                                <option value="{{$prd->id_prodi}}">{{$prd->prodi}}</option>
                        @endforeach
                    </select>
                    {{Form::label('jenis-biaya','Jenis Biaya :')}}
                    {{Form::text('jenis_biaya','',['class'=>'form-control form-group','placeholder'=>'Jenis Biaya','required'])}}
                    {{Form::label('jumlah-biaya','Jumlah Biaya :')}}
                    {{Form::text('jumlah_biaya','',['class'=>'form-control form-group','placeholder'=>'Jumlah Biaya','required'])}}
                    {{Form::label('kelas','Kelas :')}}
                    <select name="kelas" class="form-group form-control">
                        <option value="reguler">Reguler</option>
                        <option value="karyawan">Karyawan</option>
                    </select>
                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div style="margin-top:15px;" class="col-lg-9">
            <h2>Tabel Biaya Prodi</h2>
            <hr>
            <table id="tabel" class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Jumlah Biaya</th>
                    <th scope="col">Jenis Biaya</th>
                    <th scope="col">Kelas</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($biaya_prodi as $bp)
                <tr>
                    <td></td>
                    <td>{{$bp->prodi}}</td>
                    <td>Rp. {{ number_format($bp->jumlah_biaya, 2, ',', '.') }}</td>
                    <td>{{$bp->jenis_biaya}}</td>
                    <td>{{$bp->kelas}}</td>
                    <td>
                        <a class="btn btn-success" style="color:#fff;float:left; margin-right:20px;" data-toggle="modal" data-target="#biaya-prodi-edit-modal{{$bp->id_biaya}}">Edit</a>
                    </td>
                    <td>
                    {!!Form::open(['action'=>['BiayaProdiController@destroy', $bp->id_biaya], 'method'=>'POST','id'=>'form-delete-biaya-prodi'.$bp->id_biaya])!!}
                        {{Form::hidden('_method', 'DELETE')}}                                              
                        {{Form::submit('Hapus',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                    <script>
                            document.querySelector('#form-delete-biaya-prodi{{$bp->id_biaya}}').addEventListener('click', function(e){
                            var form =this;
                                
                            swal({
                            title: 'Hapus data yang dipilih?',
                            text: "Klik Hapus untuk menghapus data !",
                            icon: 'warning',
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
                <!-- Modal Edit biaya prodi-->
                <div class="modal fade" id="biaya-prodi-edit-modal{{$bp->id_biaya}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Edit Biaya Prodi</h2>   
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                  
                                {!!Form::open(['action'=>['BiayaProdiController@update', $bp->id_biaya], 'method'=>'PUT'])!!}
                                    {{Form::label('Prodi','Prodi :')}}
                                    <select  name="id_prodi" class="form-control form-group">
                                        @foreach($prodi as $prd)
                                        @if ($bp->id_prodi == $prd->id_prodi)
                                              <option value="{{ $prd->id_prodi }}" selected>{{ $prd->prodi }}</option>
                                        @else
                                              <option value="{{ $prd->id_prodi }}">{{ $prd->prodi }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    {{Form::number('jumlah_biaya',$bp->jumlah_biaya,['class'=>'form-control form-group','placeholder'=>'Jumlah Biaya','required'])}}
                                    {{Form::text('jenis_biaya',$bp->jenis_biaya,['class'=>'form-control form-group','placeholder'=>'Jenis Biaya','required'])}}
                                    {{Form::label('kelas','Kelas :')}}
                                    <select name="kelas" class="form-group form-control">
                                        <option {{old('kelas',$bp->kelas)=="karyawan"? 'selected':''}}  value="karyawan">Karyawan</option>
                                        <option {{old('kelas',$bp->kelas)=="reguler"? 'selected':''}} value="reguler">Reguler</option>
                                     </select>
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