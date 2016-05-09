@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/add-edit.css">

@section('content')
	<hr>

	@include('errors._list')
	<div class="col-sm-6 col-sm-3 col-sm-offset-2">
		<div class="title-box">
			<center>Edit: {!! $type->name !!}</center>
		</div>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<div class= "panel panel-default">
			{!! Form::model($type, ['method' => 'PATCH', 'action' => ['RequestTypesController@update', $type->id]]) !!}
				@include('request_types._form', ['submitButtonText' => 'Update'])
			{!! Form::close() !!}
			{!! Form::open(['method' => 'DELETE', 'action' => ['RequestTypesController@destroy', $type->id], 'class' => 'deleteForm']) !!}
				<fieldset class="form-group" style="padding-top: 0;">
					{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				</fieldset>
			{!! Form::close() !!}
		</div>
	</div>

@stop

@section('footer')
	<script>
	    $(".deleteForm").on("submit", function(){
	        return confirm("Do you want to delete this item?");
	    });
	</script>
@stop