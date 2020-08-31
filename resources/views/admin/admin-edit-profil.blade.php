@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-top:10px;" class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h4><b>Edit Profil</b></h4></div>
                <div class="card-body">
                    {!!Form::open(['action'=>['AdminController@adminUpdateProfil', Auth::user()->id_user], 'method'=>'PUT'])!!}
                        <div class="form-group">
                            <p>NIM : {{Auth::user()->nim}} <br></p>
                            <p>Name : {{Auth::user()->name}}</p>
                            <input type="password" name="password" class="form-control form-group" placeholder="Ubah Password">
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                        <a href="{{route('admin_dashboard')}}" class="btn btn-primary btn-block mt-3">Kembali Ke Halaman Admin</a>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection