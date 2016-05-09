@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/add-edit.css">

@section('content')
<hr>

	@include('errors._list')

	<div class="col-sm-6 col-sm-3 col-sm-offset-2">
		<div class="title-box">
			<center>Edit: {!! $insurance->name !!}</center>
		</div>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<div class= "panel panel-default">
			{!! Form::model($insurance, ['method' => 'PATCH', 'action' => ['InsurancesController@update', $insurance->provider->id, $insurance->id]]) !!}
				@include('insurances._form', ['submitButtonText' => 'Update'])
			{!! Form::close() !!}

			@if (Auth::user()->isAdmin())
				{!! Form::open(['method' => 'DELETE', 'action' => ['InsurancesController@destroy', $insurance->provider->id, $insurance->id], 'class' => 'deleteForm']) !!}
					<fieldset class="form-group" style="padding-top: 0;">
						{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}  
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					</fieldset>
				{!! Form::close() !!}
			@endif
		</div>
	</div>

@stop