@extends('layouts.app')

@section('content')
	<h1>Customers <a href="{{ action('CustomersController@create')}}" class="btn btn-primary">Add</a></h1>
	<hr>

	@unless ($customers->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Requests</th>
					@if (Auth::user()->isAdmin())
					<th>Action</th>
					@endif
				</tr>
			</thead>

			@foreach ($customers as $customer)
				<tr>
					<td><a href="{{ action('CustomersController@show', [$customer->id]) }}" class="">{{ $customer->first_name . ' ' . $customer->last_name . ', ' . $customer->middle_name  }}</a></td>
					<td>{{ $customer->email }}</td>
					<td>{{ $customer->phone_num }}</td>
					<td>{{ $customer->total_requests }}</td>
					@if (Auth::user()->isAdmin())
						<td><a href="{{ action('CustomersController@edit', [$customer->id]) }}" class="btn btn-primary">Edit</a></td>
					@endif
				</tr>
			@endforeach
		</table>
	@endunless
@stop