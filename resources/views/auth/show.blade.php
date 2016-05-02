@extends('layouts.app')

@section('content')
	<h1>{{ $user->name }}</h1>
	<hr>
		<content>
			{{ $user->email }}
		<br>
			{{ $user->phone_num }}
		</content>
	<br>

	<h5>Requests:</h5>
	@include('requests._list')
@stop