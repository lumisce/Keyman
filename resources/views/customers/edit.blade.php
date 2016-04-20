@extends('layouts.app')

@section('content')
	<h1>Edit: {!! $customer->first_name . ' ' . $customer->last_name . ', ' . $customer->middle_name  !!}</h1>
	
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

	{!! Form::model($customer, ['method' => 'PATCH', 'action' => ['CustomersController@update', $customer->id]]) !!}
		@include('customers._form', ['submitButtonText' => 'Update Customer'])
	{!! Form::close() !!}
@stop