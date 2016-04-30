@extends('layouts.app')

@section('content')
	<h1>Add a New Request Type</h1>

	<hr>

	@include('errors._list')

	{!! Form::model($type = new \App\RequestType, ['url' => 'request_types']) !!}
		@include('request_types._form', ['submitButtonText' => 'Add Type'])
	{!! Form::close() !!}

@stop