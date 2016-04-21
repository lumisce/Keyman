@extends('layouts.app')

@section('content')
	<h1>{{ $provider->name }} <a href="{{ action('ProvidersController@edit', [$provider->id])}}" class="btn btn-primary">Edit</a></h1>
	<hr>
		<content>
			{{ $provider->location }}
		<br>
			{{ $provider->email }}
		<br>
			{{ $provider->phone_num }}
		</content>
	<br>
	@unless ($provider->insurances->isEmpty())
		<h5>Insurances:</h5>
		<ul>
			@foreach ($provider->insurances as $insurance)
				<li>{{ $insurance->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop