@extends('layouts.app')

@section('content')
	
	<a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
	<a href="{{ url('/register') }}" class="btn btn-link">Register</a>

@stop