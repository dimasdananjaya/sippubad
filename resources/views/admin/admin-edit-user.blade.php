@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    {!!Form::open(['action'=>['UserController@update',$user->id_user], 'method'=>'POST'])!!}
                    <div class="form-group">
                        {{Form::label('nim','Nim :')}}
                        {{Form::text('nim',$user->nim,['class'=>'form-control form-group','placeholder'=>'NIM','required'])}}

                        {{Form::label('name','Nama :')}}
                        {{Form::text('name',$user->name,['class'=>'form-control form-group','placeholder'=>'Nama','required'])}}

                        @if ($errors->has('nim'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nim') }}</strong>
                            </span>
                        @endif
                        {{Form::label('Prodi','Prodi :')}}
                        <select name="id_prodi" class="form-group form-control">
                            @foreach($prodi as $prd)
                            @if ($user->id_prodi == $prd->id_prodi)
                                <option value="{{ $prd->id_prodi }}" selected>{{ $prd->prodi }}</option>
                            @else
                                <option value="{{ $prd->id_prodi }}">{{ $prd->prodi}}</option>
                            @endif
                            @endforeach
                        </select>
                        {{Form::label('Angkatan','Angkatan :')}}
                        <select name="angkatan" class="form-group form-control">
                            @foreach($periode as $periode1)
                                @if ($user->id_periode == $periode1->id_periode)
                                    <option value="{{ $periode1->periode }}" selected>{{ $periode1->periode }}</option>
                                @else
                                    <option value="{{ $periode1->periode }}">{{ $periode1->periode }}</option>
                                @endif
                            @endforeach
                        </select>

                        {{Form::label('kelas','Kelas :')}}
                        <select name='kelas' class="form-control form-group"> <!--ingat name nya-->
                            <option {{old('kelas',$user->kelas)=="reguler"? 'selected':''}} value="reguler">Reguler</option>
                            <option {{old('kelas',$user->kelas)=="karyawan"? 'selected':''}} value="karyawan">Karyawan</option>
                        </select>

                        {{Form::label('Status Perkuliahan','Status Perkuliahan :')}}
                        <select name='status_perkuliahan' class="form-control form-group"> <!--ingat name nya-->
                            <option {{old('status_perkuliahan',$user->status_perkuliahan)=="aktif"? 'selected':''}} value="aktif">Aktif</option>
                            <option {{old('status_perkuliahan',$user->status_perkuliahan)=="non-aktif"? 'selected':''}} value="non-aktif">Non-Aktif</option>
                            <option {{old('status_perkuliahan',$user->status_perkuliahan)=="cuti"? 'selected':''}} value="cuti">Cuti</option>
                            <option {{old('status_perkuliahan',$user->status_perkuliahan)=="lulus"? 'selected':''}} value="lulus">Lulus</option>
                        </select>
                    </div>
                    {{FORM::hidden('_method','PUT')}}
                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                    <a href="/admin/user" class="btn btn-block btn-primary">Kembali</a>
                {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection