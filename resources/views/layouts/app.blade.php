<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../home/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../home/assets/img/favicon.png">
    <title>
        Now UI Design System PRO by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,200|Open+Sans+Condensed:700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../home/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../home/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../home/assets/css/now-design-system-pro.css?v=2.2.0" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Pharmacie
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-info text-white m-2 p-2" href="{{ route('landing.medicine') }}">Shop Medicine</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a href="{{route('user.doctors.index')}}" class="dropdown-item">
                                        Dashboard Appointment
                                    </a>

                                    @guest
                                    @else
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                            <a href="{{route('admin.dashboard')}}" class="dropdown-item">
                                                Dashboard Admin
                                            </a>
                                        @endif

                                    @endguest
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('home/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('home/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('home/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/mattboldt/typed.js/ -->
    <script src="{{ asset('home/assets/js/plugins/typedjs.js') }}"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="{{ asset('home/assets/js/plugins/parallax.min.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('home/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for the GlideJS Carousel, full documentation here: http://kenwheeler.github.io/slick/ -->
    <script src="{{ asset('home/assets/js/plugins/glidejs.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for the blob animation -->
    <script src="{{ asset('home/assets/js/plugins/anime.min.js') }}" type="text/javascript"></script>
    <!-- Chart JS -->
    <script src="{{ asset('home/assets/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center foe Now UI Design System: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="{{ asset('home/assets/js/now-design-system-pro.min.js') }}" type="text/javascript"></script>

    <!--  CSS Files -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/now-ui-dashboard.min.css?v=2.2.0') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/css/now-ui-dashboard-pro.min.css?v=2.2.0') }}">



</body>
</html>
