@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/add-edit.css">

@section('content')
	<hr>

	@include('errors._list')
	<div class="col-sm-6 col-sm-3 col-sm-offset-2">
		<div class="title-box">
			<center>Add New Provider</center>
		</div>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<div class= "panel panel-default">
			{!! Form::model($provider = new \App\Provider, ['url' => 'providers']) !!}
				@include('providers._form', ['submitButtonText' => 'Add'])
			{!! Form::close() !!}
		</div>
	</div>
@stop