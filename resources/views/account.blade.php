@extends('layouts.app')

@section('content')
	<h1>{{ Auth::user()->name }} <a href="{{ action('Auth\AuthController@edit', [Auth::user()->id])}}" class="btn btn-primary">Edit</a></h1>
	<hr>
		<content>
			{{ Auth::user()->email }}
		<br>
			{{ Auth::user()->phone_num }}
		</content>
	<br>

	<h5>Requests:</h5>
	@include('requests._list')
@stop