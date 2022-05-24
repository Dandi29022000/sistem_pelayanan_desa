<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                        <a href="{{ route('home') }}">Sistem Pelayanan Publik</a>
                    </div>
                </header>

                <!-- Content -->
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">

            <div class="inner">

                <!-- Search Box -->
                <section id="search" class="alt">
                    <form method="get" action="#">
                        <input type="text" name="search" id="search" placeholder="Search..." />
                    </form>
                </section>

                <!-- Menu -->
                <nav id="menu">
                    <ul>
                        <li><a href="{{ route('home') }}">Homepage</a></li>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @elseif(Auth::user()->email == 'admin@admin.com')
                        <li><a href="{{ route('admin.surat-kelahiran') }}">Permintaan Surat Kelahiran</a></li>
                        <li><a href="{{ route('admin.surat-kematian') }}">Permintaan Surat Kematian</a></li>
                        <li><a href="{{ route('admin.surat-pindah') }}">Permintaan Surat Kepindahan</a></li>
                        <li><a href="{{ route('admin.surat-penduduk') }}">Permintaan Surat Menjadi Penduduk</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif -->

                        @else
                        <li><a href="{{ route('keluarga.index') }}">Anggota Keluarga</a></li>
                        <li>
                            <span class="opener">Pelayanan</span>
                            <ul>
                                <li><a href="{{ route('surat-kelahiran.index') }}">Surat Kelahiran</a></li>
                                <li><a href="{{ route('surat-kematian.index') }}">Surat Kematian</a></li>
                                <li><a href="{{ route('surat-pindah.index') }}">Surat Kepindahan Penduduk</a></li>
                                <li><a href="{{ route('surat-penduduk.index') }}">Surat Menjadi Penduduk</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </nav>

                <!-- Footer -->
                <footer id="footer">
                    <p class="copyright">Copyright &copy; 2021 Kelompok 3
                        <br>Designed by <a rel="nofollow" href="https://www.instagram.com/pramudyawibowo_">Pramudya
                            Wibowo</a></p>
                </footer>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/browser.min.js') }}"></script>
    <script src="{{ asset('js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('js/transition.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
