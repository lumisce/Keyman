@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/add-edit.css">

@section('content')
	<hr>

	@include('errors._list')
	<div class="col-sm-6 col-sm-3 col-sm-offset-2">
		<div class="title-box">
			<center>Add a New Insurance Plan to {{ $provider->name }}</center>
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div class= "panel panel-default">
			{!! Form::model($insurance = new \App\Insurance, ['url' => 'providers/'. Request::segment(2) .'/plans']) !!}
				@include('insurances._form', ['submitButtonText' => 'Add'])
			{!! Form::close() !!}
		</div>
	</div>
@stop