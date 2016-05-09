<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KeyMan</title>

    <!-- Styles -->
     {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'> --}}
    <link rel="stylesheet" href="/assets/css/vendor/tether.css">
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/vendor/select2.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <img id="logoSmall" src="/assets/images/KeymanLogo2.png" style="height:33px; width: 55px; padding-right: 20px; margin: 20px 0 10px 10px;">
                <img id="logoLarge" src="/assets/images/Logo_KIS.png" style="height:100px; padding-right: 20px; margin-top: 20px; margin-left: 10px;">
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="usernameMenu" data-toggle="dropdown" role="button" aria-expanded="false" style ="text-transform: uppercase;">
                                <i id="i">{{ Auth::user()->name }}</i> <i class="fa fa-btn fa-user fa-lg"> </i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/account') }}"></i>Account</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                    	<li id="requestsButton"><a href="{{ url('/requests') }}">REQUESTS</a></li>
                    	<li id="customersButton"><a href="{{ url('/customers') }}">CUSTOMERS</a></li>
                    	<li id="providersButton"><a href="{{ url('/providers') }}">PROVIDERS</a></li>
                    @endif
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <li id="adminButton" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ADMIN<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li id="insTypesButton"><a href="{{ url('/types') }}">INS TYPES</a></li>
                                <li id="reqTypesButton"><a href="{{ url('/request_types') }}">REQ TYPES</a></li>
                                <li id="usersButton"><a href="{{ url('/users') }}">USERS</a></li>
                            </ul>
                    @endif
                </ul>                
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('flash::message')

                @yield('content')
            </div>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="/assets/js/vendor/jquery-2.2.3.js"></script>
    <script src="/assets/js/vendor/tether.js"></script>
    <script src="/assets/js/vendor/bootstrap.js"></script>
    <script src="/assets/js/vendor/select2.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer')
</body>
</html>
