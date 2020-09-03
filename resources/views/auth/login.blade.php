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
                        <h2><b>SIPP UBAD</b></h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="nim" type="nim" class="form-control @error('nim') is-invalid @enderror"
                                        name="nim" value="{{ old('nim') }}" required autocomplete="nim" placeholder="NIM" autofocus>

                                    @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
</section>


@endsection