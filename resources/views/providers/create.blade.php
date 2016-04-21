@extends('layouts.app')

@section('content')
	<h1>Add a New Provider</h1>

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

	{!! Form::model($provider = new \App\Provider, ['url' => 'providers']) !!}
		@include('providers._form', ['submitButtonText' => 'Add Provider'])
	{!! Form::close() !!}

@stop