@extends('layouts.app')

@section('content')
<section id="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="card login-form">
                    <img class="card-img-top" src="/resources/logo/online-banking.png">
                    <div class="card-body">
                        <h2><b>SIPA UBAD</b></h2>
                        <div class="text-center" style="margin-top:60px;">
                        <h3>Welcome To SIPA UBAD</h3>
                        <h5>Silahkan Login Terlebih Dahulu</h5>
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