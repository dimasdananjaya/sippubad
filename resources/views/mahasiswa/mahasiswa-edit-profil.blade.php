@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-top:10px;" class="row justify-content-center">
        <h3>Edit Profil</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Profil') }}</div>
                <div class="card-body">
                    {!!Form::open(['action'=>['DashboardMahasiswa@mahasiswaUpdateProfil', Auth::user()->id_user], 'method'=>'PUT'])!!}
                        <div class="form-group">
                            <p>NIM : {{Auth::user()->nim}} <br></p>
                            <p>Name : {{Auth::user()->name}}</p>
                            <input type="password" name="password" class="form-control form-group" placeholder="Password Baru">
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection