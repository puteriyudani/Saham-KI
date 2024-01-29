<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/imagi/imagi-white.jpeg') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/highcharts.js') }}"></script>
    <style>
        .fas,
        .far,
        .fab,
        .fal {
            font-size: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .footer-text-align-center {
            text-align: center;
        }
    </style>
</head>

<body style="background-color: #f3f3f3;">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in as <strong>{{ Auth::user()->email }}</strong></div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> KELUAR
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand" style="margin-bottom: 20px;" style="margin-top: 20px;">
                        <a>
                            <img src="{{ asset('assets/img/imagi/imagi-white.jpeg') }}" alt="logo" width="100">
                        </a>
                    </div>
                    <ul class="sidebar-menu" style="margin-top: 20px;">
                        <li class="menu-header">MAIN MENU</li>
                        @if (auth()->user() && auth()->user()->role == 'admin')
                            <li class=""><a class="nav-link" href="{{ route('admin') }}"><i
                                        class="fas fa-home"></i> <span>ADMIN DASHBOARD</span></a></li>
                            <li class=""><a class="nav-link" href="{{ route('admin.user') }}"><i
                                        class="fas fa-user"></i> <span>KELOLA USER</span></a></li>
                        @elseif(auth()->user() && auth()->user()->role == 'pemegang_saham')
                            <li class=""><a class="nav-link" href="{{ route('dashboard') }}"><i
                                        class="fas fa-home"></i> <span>DASHBOARD</span></a></li>
                        @endif
                        {{-- <li class="{{ setActive('account/dashboard') }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>DASHBOARD</span></a></li> --}}
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')



            <footer class="main-footer"
                style="border-top: 3px solid #6777ef;background-color: #ffffff;margin-bottom: -20px">
                <div class="footer-text-align-center">
                    <strong>Copyright</strong> © <strong>IMAGI</strong> <?php echo date('Y'); ?>
                </div>

                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
