@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/add-edit.css">

@section('content')
	<hr>

	@include('errors._list')
	<div class="col-sm-6 col-sm-3 col-sm-offset-2">
		<div class="title-box">
			<center>ADD NEW REQUEST</center>
		</div>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<div class= "panel panel-default">
			{!! Form::model($type = new \App\RequestType, ['url' => 'request_types']) !!}
				@include('request_types._form', ['submitButtonText' => 'Add'])
			{!! Form::close() !!}
		</div>
	</div>
@stop