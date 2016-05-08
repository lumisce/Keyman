@extends('layouts.app')

@section('content')
	<h1>Edit: {!! $provider->name !!}</h1>
	
	<hr>

	@include('errors._list')

	{!! Form::model($provider, ['method' => 'PATCH', 'action' => ['ProvidersController@update', $provider->id]]) !!}
		@include('providers._form', ['submitButtonText' => 'Update Provider'])
	{!! Form::close() !!}

	@if (Auth::user()->isAdmin())
		{!! Form::open(['method' => 'DELETE', 'action' => ['ProvidersController@destroy', $provider->id], 'class' => 'deleteForm']) !!}
			<fieldset class="form-group"> 
				{!! Form::submit('Delete Provider', ['class' => 'btn btn-danger']) !!}
			</fieldset>
		{!! Form::close() !!}
	@endif

@stop

@section('footer')
	<script>
	    $(".deleteForm").on("submit", function(){
	        if (confirm("Do you want to delete this Provider?")) {
	        	if(confirm("Are you sure? This will delete all Insurances of the Provider.")) {
	        		return(confirm("For the last time, are you sure you want to delete this?"));
	        	};
	        };
	        return false;
	    });
	</script>
@stop