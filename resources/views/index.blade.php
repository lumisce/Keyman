@extends('layouts.app')

<style>
	body {
		border-top: 8px solid rgb(233,130,51);
		text-align: center;
	}

	.navbar-default .navbar-brand {
		display: none;
	}

	.container_top_padding {
		padding-top: 60px;
	}

	.navbar-default {
    	display: none;
    }

	@media (min-width: 768px){
		.container_top_padding {
			padding-top: 80px;
		}
	}
	
</style>

@section('content')
		<div class="container_top_padding">
			<h1>
				<span style="color: rgb(233,130,51)">KEY<span style="color: rgb(0,77,139)">MAN</span></span><br />INSURANCE<br />SYSTEM
			</h1>
		</div>

		<div class="container_top_padding">
			<a href="{{ url('/login') }}"class=" btn btn-primary">LOG IN</a>
			<br />
			<a href="{{ url('/register') }}"class="btn btn-link">Register</a>
		</div>

@stop