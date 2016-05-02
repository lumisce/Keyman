@extends('layouts.app')

@section('content')
	<h1>Add a New Customer</h1>

	<hr>

	@include('errors._list')

	{!! Form::model($customer = new \App\Customer, ['url' => 'customers']) !!}
		@include('customers._form', ['submitButtonText' => 'Add Customer'])
	{!! Form::close() !!}

@stop