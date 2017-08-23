<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('meta_description')" />
        <meta name="keywords" content="@yield('meta_keywords')">
        <meta name="robots" content="@yield('meta_robots')">
        <meta name="googlebot" content="@yield('googlebot')">
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:description" content="@yield('meta_description')" />
        <meta property="og:image" content="http://sellnepal.com/logo.png" />
        <meta name="author" content="sellnepal">

        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="all">
        <!-- STYLE -->
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/superfish.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}"/>
        <link href="{{ asset('assets/style.min.css') }}" rel="stylesheet" media="all">
        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="home" class="loading">
        <header id="header">
            <div class="container">
                <div class="header-left">
                <h1><a href="{{ url('/') }}" id="logo">Sell<span>Nepal</span></a></h1>
                    <span class="tagline">Sell or Advertise anything</span>
                </div>
                <div class="header-right">
                    <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse" id="nav-bar">
                        <ul class="main-nav">
                            <li><a href="{{route('companies')}}">Dealers</a></li>
                        </ul>
                    </nav>
                    @if(Auth::guest())
                    <div class="user-nav">
                        <span class="user-area"><i class="fa fa-lock"></i><a href="{{ url('login') }}" class="link">Login </a> / <a
                                href="{{ url('register') }}" class="link">Register</a></span>
                        <a href="{{ url('create-ad') }}" class="button">place an ad</a>
                    </div>
                    @else
                    <?php $user = Auth::user(); ?>
                    <div class="user-nav">
                        <div class="logined">
                            @if(\Auth::user()->hasRole('vendor'))
                                @if($user->profile->company_name != '')
                                    <a href="javascript:void(0);" class="user-name"> {{ str_limit($user->profile->company_name, $limit = 10, $end = '...') }}</a>
                                @else
                                    <a href="javascript:void(0);" class="user-name">Hello User!</a>
                                @endif
                            @else
                                <a href="javascript:void(0);" class="user-name">{{ $user->firstname }}</a>
                            @endif
                            <ul class="user-link">
                                @if(\Auth::user()->hasRole('administrator'))
                                    <li><a href="{{ route('my-ads') }}">All Ads</a></li>
                                    <li><a href="{{ route('change-password') }}">Change Password</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                <li><a href="{{ route('member-area') }}">Member Area</a></li>
                                <li><a href="{{ route('my-ads') }}">My Ads</a></li>
                                <li><a href="{{ route('my-wishlist') }}">My Wishlists</a></li>
                                @if(\Auth::user()->hasRole('vendor'))
                                <li><a href="{{ route('edit-company-profile') }}">Company Profile</a></li>
                                @else
                                <li><a href="{{ route('my-profile') }}">My Profile</a></li>
                                @endif
                                <li><a href="{{ route('change-password') }}">Change Password</a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            @endif
                            </ul>
                        </div>
                        <a href="{{ route('select-category') }}" class="button">place an ad</a>
                    </div>
                    @endif
                </div>
            </div>
        </header>
