@extends('layouts.app')

@section('content')
	<h1>Process: [{{ $krequest->type->name }}] {!! $customer->first_name . ' ' . $customer->last_name . "'s " . $krequest->insurance->name !!} </h1>
	
	<hr>

	@include('errors._list')

	{!! Form::open(['action' => ['CustomersController@update', $customer->id]]) !!}
		@include('customers.requests._mail', ['submitButtonText' => 'Send Email'])
	{!! Form::close() !!}


@stop
