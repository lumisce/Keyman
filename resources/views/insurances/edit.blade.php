@extends('layouts.app')

@section('content')
	<h1>Edit: {!! $insurance->name !!}</h1>
	
	<hr>

	@include('errors._list')

	{!! Form::model($insurance, ['method' => 'PATCH', 'action' => ['InsurancesController@update', $insurance->provider->id, $insurance->id]]) !!}
		@include('insurances._form', ['submitButtonText' => 'Update Insurance'])
	{!! Form::close() !!}

	@if (Auth::user()->isAdmin())
		{!! Form::open(['method' => 'DELETE', 'action' => ['InsurancesController@destroy', $insurance->provider->id, $insurance->id], 'class' => 'deleteForm']) !!}
			<fieldset class="form-group"> 
				{!! Form::submit('Delete Insurance', ['class' => 'btn btn-danger']) !!}
			</fieldset>
		{!! Form::close() !!}
	@endif

@stop