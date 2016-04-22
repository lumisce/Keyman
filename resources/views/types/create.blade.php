@extends('layouts.app')

@section('content')
	<h1>Add a New Insurance Type</h1>

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

	{!! Form::model($customer = new \App\InsuranceType, ['url' => 'types']) !!}
		@include('types._form', ['submitButtonText' => 'Add Type'])
	{!! Form::close() !!}

@stop