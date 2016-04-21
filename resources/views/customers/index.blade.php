@extends('layouts.app')

@section('content')
	<h1>Customers <a href="{{ action('CustomersController@create')}}" class="btn btn-primary">Add</a></h1>
	<hr>
	@foreach ($customers as $customer)
		<article>
			<h3>
			<a href="{{ action('CustomersController@show', [$customer->id]) }}">{{ $customer->first_name . ' ' . $customer->last_name . ', ' . $customer->middle_name  }}</a>
			</h3>
		</article>
	@endforeach
@stop