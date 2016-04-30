@extends('layouts.app')

@section('content')
	<h1>Add a New Insurance Type</h1>

	<hr>

	@include('errors._list')

	{!! Form::model($customer = new \App\InsuranceType, ['url' => 'types']) !!}
		@include('types._form', ['submitButtonText' => 'Add Type'])
	{!! Form::close() !!}

@stop