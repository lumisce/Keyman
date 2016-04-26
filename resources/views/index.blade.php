@extends('layouts.app')

<style>
	p {
		font-size: 48px;
	}

	body {
		text-align: center;
		/*border-top: 8px solid rgb(233,130,51);*/
	}

	.navbar-default .navbar-brand {
		display: none;
	}
	.navbar-default .navbar-nav>li>a {
		text-align: left;
	}
	.container_top_padding {
		padding-top: 20px;
	}

/*	.navbar-default {
    	display: none;
    }
*/

	@media (min-width: 768px){
		.container_top_padding {
			padding-top: 80px;
		}
	}


</style>

@section('content')
		<div class="container_top_padding">
			<p><span style="color: rgb(233,130,51)">KEY
			</span> <span style="color: rgb(0,77,139)">MAN</span></p>
			<p>INSURANCE</p>
			<p> SYSTEM</p>
		</div>

		<div class="container_top_padding">
			<a href="{{ url('/login') }}"class=" btn btn-primary">LOG IN</a>
			<br />
			<a href="{{ url('/register') }}"class="btn btn-link">Register</a>
		</div>

@stop