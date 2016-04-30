@extends('layouts.app')

@section('content')
	<h1>Add a New Request to {{ $customer->first_name . " " . $customer->last_name }}</h1>

	<hr>

	@include('errors._list')

	{!! Form::model($krequest = new \App\KeymanRequest, [route('customers.requests.store', $customer)]) !!}
		@include('customers.requests._form', ['submitButtonText' => 'Add Request'])
	{!! Form::close() !!}

@stop