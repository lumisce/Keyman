@extends('layouts.app')

@section('content')
	<h1>Add a New Request to {{ $customer->fullName }}</h1>

	<hr>

	@include('errors._list')

	{!! Form::model($krequest = new \App\KeymanRequest, ['action' => ['RequestsController@store', $customer->id]]) !!}
		@include('customers.requests._form', ['submitButtonText' => 'Add Request'])
	{!! Form::close() !!}

@stop

@section('footer')
	<script>
	    $(".deleteForm").on("submit", function(){
	        return confirm("Do you want to delete this item?");
	    });
	</script>
@stop