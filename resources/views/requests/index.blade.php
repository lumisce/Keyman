@extends('layouts.app')

@section('content')
	<h1>Requests</h1>
	<hr>

	@unless ($requests->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Date Received</th>
					<th>Customer</th>
					<th>Insurance</th>
					<th>Request</th>
					<th>Turnaround Date</th>
					<th>Consultant</th>
					<th>Status</th>
					<th>Progress</th>
					<th>Action</th>
				</tr>
			</thead>

			@foreach ($requests as $krequest)
				<tr>
					<td>{{ explode(' ',$krequest->created_at)[0] }}</td>
					<td><a href="{{ action('CustomersController@show', [$krequest->customer->id]) }}" class="">{{ $krequest->customer->first_name . ' ' . $krequest->customer->last_name . ', ' . $krequest->customer->middle_name  }}</a></td>
					<td>{{ $krequest->insurance->name }}</td>
					<td>{{ $krequest->type->name }}</td>
					<td>{{ explode(' ',$krequest->turnaround_date)[0] }}</td>
					<td>{{ $krequest->users()->first()->name }}</td>
					<td>{{ $krequest->status }}</td>
					<td>{{ $krequest->users()->first()->pivot->progress }}</td>
					<td><a href="{{ action('RequestsController@edit', [$krequest->customer->id, $krequest->id]) }}" class="btn btn-primary">Process</a></td>
				</tr>
			@endforeach
		</table>
	@endunless
@stop