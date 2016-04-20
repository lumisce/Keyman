@extends('layouts.app')

@section('content')
	<h1>{{ $customer->first_name . ' ' . $customer->last_name . ', ' . $customer->middle_name }} <a href="{{ URL::action('CustomersController@edit', [$customer->id])}}" class="btn btn-primary">Edit</a></h1>
	<hr>
		<content>
			{{ $customer->email }}
		<br>
			{{ $customer->phone_num }}
		</content>
	<br>
	@unless ($customer->insurances->isEmpty())
		<h5>Insurances:</h5>
		<ul>
			@foreach ($customer->insurances as $insurance)
				<li>{{ $insurance->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop