<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

    <link rel="shortcut icon" href="/resources/logo/balidwipa.png" />
    <link rel="apple-touch-icon" href="/resources/logo/balidwipa.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>SIPP UBAD</title>

    <script src="https://kit.fontawesome.com/4f161c1c95.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <!--datatables-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <!--<div id="app"> modal error-->
        <nav class="navbar navbar-default navbar-expand-lg navbar-light">
            <div class="navbar-header d-flex col">
                <a class="navbar-brand" href="{{route('admin_dashboard')}}"><img src="/resources/logo/balidwipa.png"
                        class="navbar-logo" />Universitas Bali Dwipa
                </a>
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                    class="navbar-toggle navbar-toggler ml-auto">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
                <ul class="nav navbar-nav">

                    <li class="nav-item dropdown">

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <ul class="dropdown-menu">
                            <li></li>
                            <li>

                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <ul class="dropdown-menu">
                            <li>

                            </li>
                            <li>

                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @elseif(Auth::user()->acs === '1')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{route('admin-edit-profil-page')}}">Profil</a>
                                <a class="dropdown-item" href="{{route('admin_dashboard')}}">Home</a>
                            </div>
                        </li>
                    @elseif(Auth::user()->acs === '2')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{route('mahasiswa-edit-profil-page')}}">Profil</a>
                                <a class="dropdown-item" href="{{route('mahasiswa_dashboard')}}">Home</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        @include('sweetalert::alert')
        @yield('content')

    </div>
    
    <hr>
    <footer class="fdb-block footer-large">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <a class="navbar-brand" style="color: black;"><img src="/resources/logo/balidwipa.png"
                        class="navbar-logo" />Universitas Bali Dwipa
                     </a>
                    <p>Jalan Pulau Flores No.5<br>Denpasar, Bali 80114</p>
                    <p>Email : info@balidwipa.ac.id</p>
                    <p>Whatsapp : 085792463944</p>
                    <p>Phone : 081339827770</p>
                    <p><small>Icons and Pictures by: freepik.com and flaticon.com</small></p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>


    @if (Session::has('alert.config'))
        @if(config('sweetalert.animation.enable'))
            <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
        @endif
        <script src="{{ $cdn?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
        <script>
            Swal.fire({!! Session::pull('alert.config') !!});
        </script>
    @endif
</body>

</html>