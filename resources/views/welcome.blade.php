@extends('layouts.app')

@section('content')
<section id="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="card login-form">
                    <img class="d-block mx-auto" src="/resources/logo/welcome.svg" style="max-width:20em; max-height:18em;">
                    <div class="card-body">
                        <div class="text-center" style="margin-top:1em;">
                        <h3>Welcome To SIPA UBAD</h3>
                        <p>Silahkan Login Terlebih Dahulu</p>
                        <a href="/login" class="btn btn-success">Login Page</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
</section>


@endsection