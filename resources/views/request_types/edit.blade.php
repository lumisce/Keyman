@extends('layouts.app')

@section('content')
	<h1>Edit: {!! $type->name !!}</h1>
	
	<hr>

	@include('errors._list')

	{!! Form::model($type, ['method' => 'PATCH', 'action' => ['RequestTypesController@update', $type->id]]) !!}
		@include('request_types._form', ['submitButtonText' => 'Update Type'])
	{!! Form::close() !!}

	{!! Form::open(['method' => 'DELETE', 'action' => ['RequestTypesController@destroy', $type->id], 'id' => 'deleteForm']) !!}
		<fieldset class="form-group"> 
			{!! Form::submit('Delete Type', ['class' => 'btn btn-danger']) !!}
		</fieldset>
	{!! Form::close() !!}

@stop

@section('footer')
	<script>
	    $("#deleteForm").on("submit", function(){
	        return confirm("Do you want to delete this item?");
	    });
	</script>
@stop