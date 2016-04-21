@extends('layouts.app')

@section('content')
	<h1>Providers <a href="{{ action('ProvidersController@create')}}" class="btn btn-primary">Add</a></h1>
	<hr>
	@foreach ($providers as $provider)
		<article>
			<h3>
			<a href="{{ action('ProvidersController@show', [$provider->id]) }}">{{ $provider->name }}</a>
			</h3>
		</article>
	@endforeach
@stop