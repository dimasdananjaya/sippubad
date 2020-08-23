@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">{{ __('Registrasi') }}</div>

                <div class="card-body">
                    {!!Form::open(['action'=>'UserController@store', 'method'=>'POST'])!!}
                    <div class="form-group">
                        {{Form::label('nim','Nim :')}}
                        <input placeholder="NIM" id="nim" type="text" class="form-group form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required>

                        @if ($errors->has('nim'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nim') }}</strong>
                        </span>
                        @endif
                        
                        {{Form::label('name','Nama :')}}
                        {{Form::text('name','',['class'=>'form-control form-group','placeholder'=>'Nama','required'])}}

                        {{Form::label('Prodi','Prodi :')}}
                        <select id="prodi" name="id_prodi" class="form-control form-group">
                            @foreach($prodi as $prd)
                            <option value="{{$prd->id_prodi}}">{{$prd->prodi}}</option>
                            @endforeach
                        </select>
                        {{Form::label('Angkatan','Angkatan :')}}
                        <select id="angkatan" name="angkatan" class="form-control form-group">
                            @foreach($periode as $periode1)
                            <option value="{{$periode1->periode}}">{{$periode1->periode}}</option>
                            @endforeach
                        </select>
                        {{Form::label('Role','Role :')}}
                        <select name='acs' class="form-control form-group"> <!--ingat name nya-->
                            <option  value='2'>Mahasiswa</option>
                        </select>
                        
                        {{Form::label('kelas','Kelas :')}}
                        <select name='kelas' class="form-control form-group"> <!--ingat name nya-->
                            <option  value='reguler'>Reguler</option>
                            <option  value='karyawan'>Karyawan</option>
                        </select>

                    </div>
                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>

        <div style="margin-top:20px;" class="col-lg-7">
            <h3>Data User dan Mahasiswa</h3>
            <hr>
            <table id="tabel" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Kelas</th>
                    <th>Status Perkuliahan</th>
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
                    <td>{{$usr->kelas}}</td>
                    <td>{{$usr->status_perkuliahan}}</td>
                    <td><a href="{{ route('user.edit', $usr->id_user) }}" class="btn btn-warning btn-sm">Edit</a></td>
                 </tr>
                @endforeach
                </tbody>
              </table>
        </div>
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