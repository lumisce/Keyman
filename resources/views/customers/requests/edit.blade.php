@extends('layouts.app')

@section('content')
	<h1>Process: [{{ $krequest->type->name }}] {!! $customer->fullName . "'s " . $krequest->insurance->name !!} 
		{!! Form::open(['method' => 'PATCH', 'action' => ['RequestsController@update', $customer->id, $krequest->id]]) !!}
			<fieldset class="form-group"> 
				{!! Form::submit('Set Status to Pending', ['class' => 'btn btn-info']) !!}
			</fieldset>
		{!! Form::close() !!}
	</h1>
	
	<hr>

	@include('errors._list')

	{!! Form::open(['action' => ['RequestsController@email', $customer->id, $krequest->id]]) !!}
		@include('customers.requests._mail', ['submitButtonText' => 'Send Email'])
	{!! Form::close() !!}



@stop
