@extends('layouts.app')

@section('content')
	<h1>Add a New Insurance to {{ $customer->fullName }}</h1>

	<hr>

	@include('errors._list')

	{!! Form::open(['action' => ['CustomerInsurancesController@store', $customer->id]]) !!}
		@include('customers.insurances._form', ['submitButtonText' => 'Add Insurance'])
	{!! Form::close() !!}

@stop