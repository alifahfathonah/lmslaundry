<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMS Laundry</title>
    <!-- Font Awesome Icons -->    
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('public/css/input-style.css')}}"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Alertify -->
    <link rel="stylesheet" href="{{asset('public/plugins/alertify/themes/alertify.core.css')}}" />
	<link rel="stylesheet" href="{{asset('public/plugins/alertify/themes/alertify.default.css')}}" id="toggleCSS" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    
<!-- JS  -->
    <!-- jQuery -->
    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('public/dist/js/adminlte.js')}}"></script>

    
    <!-- DataTables --> 
    <script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquerymask/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('public/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- Alertify -->
    <script src="{{asset('public/plugins/alertify/lib/alertify.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('public/plugins/select2/js/select2.full.min.js')}}"></script>    
<style>
    .carousel .item {
        height: 300px;
    }

    .item img {
        position: absolute;
        top: 0;
        left: 0;
        min-height: 300px;
    }
</style>
</head>
<body class="hold-transition layout-top-nav layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light">
            <div class="container">
                <a href="{{route('home')}}" class="navbar-brand">
                    <i class="fas fa-home"></i>
                    <span class="brand-text font-weight-light">LMSLaundry</span>
                </a>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt" style="color:black;"></i>
                            Masuk
                        </a>
                    </li>
                    @else
                    <!-- Status Laundry  -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tshirt" style="color:black;"></i>
                        </a>
                    </li>
                    <!-- Order Laudry  -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('orderstatus')}}">
                            <i class="fas fa-shopping-cart" style="color:black;"></i>
                        </a>
                    </li>                    
                    <!-- Dropdown Profile  -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown">
                            <i class="fas fa-user" style="color:black;" ></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ Auth::user()->fullname }}</span>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-envelope mr-2"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=""><i class="fas fa-user"></i> {{ __('My Profile') }}</a>
                        </div>
                    </li>
                    @if(Auth::user()->access<=4)
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">
                                <i class="fas fa-file-invoice-dollar" style="color:black;"></i>
                            </a>
                        </li>
                    @endif
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Main Footer -->
        <footer class="main-footer">
            <a href=""><i class="fas fa-clipboard-list"></i></a>
        </footer>
    </div>
</body>
</html>
