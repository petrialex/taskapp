<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home - Task management system</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- End GOOGLE FONT -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <header class="app-header">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="top-bar">
            <div class="top-bar-brand">
                <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
                <a href="">TaskApp</a>
            </div>
            <div class="top-bar-list">
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                </div>
                <div class="top-bar-item top-bar-item-full">
                </div>
                @guest

                @else
                    <div class="top-bar-item top-bar-item-full">
                        <form class="top-bar-search">
                            <div class="input-group input-group-search dropdown">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-search"></span></span>
                                </div>
                                <input type="text" class="form-control" data-toggle="dropdown" aria-label="Search" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">

                    <div class="dropdown d-flex">
                        <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="user-avatar user-avatar-md">
                                <img src="{{ Voyager::image(  Auth::user()->avatar ) }}" alt="">
                            </span>
                            <span class="account-summary pr-lg-4 d-none d-lg-block">
                                <span class="account-name">{{ Auth::user()->name }}</span>
                                <span class="account-description">Manager</span >
                            </span>
                        </button> <!-- .dropdown-menu -->
                        <div class="dropdown-menu">
                        <div class="dropdown-arrow ml-3"></div>
                        <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6>
                            <a class="dropdown-item" href="profile"><span class="dropdown-icon oi oi-person"></span> Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="dropdown-icon fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Help Center</a>
                            <a class="dropdown-item" href="#">Ask Forum</a>
                        </div><!-- /.dropdown-menu -->
                    </div>

                </div><!-- /.top-bar-item -->
                @endguest
            </div><!-- /.top-bar-list -->
            </div>
        </nav>
        </header>


        @yield('content')

    </div>
</body>
</html>
