<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>

        body {
            font-family: 'Montserrat';
            background-color: #fafafa; 
            color: rgb(38,);
        }

        h1, h3{
        	font-family: 'Oswald';
        	letter-spacing: 2px;
        }

        h1 {
        	font-size: 54px;
        	text-align: center;
        }

        .navbar-default {
    		background-color: #fafafa;
    		border-color: rgb(233,130,51);
    		border-width: 8px 0 0;    		
    	}

    	.navbar-nav>li {
    		border-width: 0 0 0 8px;
    		border-style: solid;
    		border-color: transparent;
    	}

    	.navbar-nav>li:hover {
    		background-color: #f5f5f5;
    		border-color: rgb(233,130,51);
    	}

    	.navbar-default .navbar-nav>li>a {
    		color: rgb(0,77,139);
    		padding: 14px 15px 14px 15px;
    		font-family:'Varela Round';
    	}


    	@media (min-width: 768px) {

    		.navbar-default .navbar-nav>li>a {
    			padding-top: 40px;
    			text-align: center;
    		}

    		.navbar {
    			height: 84px;
    		}

    		.navbar-nav>li {
    			border-width: 0 0 8px 0;
    			min-width: 120px;
    		}
    	}

    	.btn-primary {
    		color: white;
    		background-color: rgb(233,130,51);
    		border: 0;
    		padding: 14px 64px;
		}

		.btn {
    		align: center;
    	}

    	.navbar-default .navbar-toggle {
   			border: 0;
		}

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3><span style="color: rgb(233,130,51)">KEY<span style="color: rgb(0,77,139)">MAN</span></span></h3>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                    	<li><a href="{{ url('/requests') }}">REQUESTS</a></li>
                    	<li><a href="{{ url('/customers') }}">CUSTOMERS</a></li>
                    	<li><a href="{{ url('/providers') }}">PROVIDERS</a></li>
                    @endif
                    @if (Auth::check() && Auth::user()->isAdmin())
                    <li><a href="{{ url('/types') }}">Types</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('flash::message')

                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer')
</body>
</html>
