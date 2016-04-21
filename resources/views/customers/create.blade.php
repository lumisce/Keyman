@extends('layouts.app')

@section('content')
	<h1>Add a New Customer</h1>

	<hr>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{!! Form::model($customer = new \App\Customer, ['url' => 'customers']) !!}
		@include('customers._form', ['submitButtonText' => 'Add Customer'])
	{!! Form::close() !!}

@stop