@extends('layouts.app')

@section('content')
	<h1>{{ $customer->fullName }} <a href="{{ action('CustomersController@edit', [$customer->id])}}" class="btn btn-primary">Edit</a></h1>
	<hr>
		<content>
			{{ $customer->email }}
		<br>
			{{ $customer->phone_num }}
		</content>
	<br>
	<h5>Insurances: <a href="{{ action('CustomerInsurancesController@create', [$customer->id]) }}" class="btn btn-primary">Add</a> </h5>
	@unless ($customer->insurances->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Provider</th>
					<th>Type</th>
					@if (Auth::user()->isAdmin())
					<th>Action</th>
					@endif
				</tr>
			</thead>
			@foreach ($customer->insurances as $insurance)
				<tr>
					<td>{{ $insurance->name }}</td>
					<td><a href="{{ action('ProvidersController@show', [$insurance->provider->id]) }}" class="">{{ $insurance->provider->name }}</a></td>
					<td>{{ $insurance->insuranceType ? $insurance->insuranceType->name : '' }}</td>
					@if (Auth::user()->isAdmin())
						<td>
							{!! Form::open(['method' => 'DELETE', 'action' => ['CustomerInsurancesController@destroy', $customer->id, $insurance->id], 'class' => 'deleteForm']) !!}
								<fieldset class="form-group"> 
									{!! Form::submit('Remove Insurance', ['class' => 'btn btn-danger']) !!}
								</fieldset>
							{!! Form::close() !!}
						</td>
					@endif
				</tr>
			@endforeach
		</table>
	@endunless

	<h5>Requests: {{ $customer->total_requests }} <a href="{{ action('RequestsController@create', [$customer->id])}}" class="btn btn-primary">Add</a></h5>
	@include('requests._list')
@stop