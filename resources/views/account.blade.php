@extends('layouts.app')

@section('content')
	<h1>{{ Auth::user()->name }} <a href="{{ action('Auth\AuthController@edit', [Auth::user()->id])}}" class="btn btn-primary">Edit</a></h1>
	<hr>
		<content>
			{{ Auth::user()->email }}
		<br>
			{{ Auth::user()->phone_num }}
		</content>
	<br>

	<h5>Requests:</h5>
	@unless (Auth::user()->requests->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Date Received</th>
					<th>Customer</th>
					<th>Insurance</th>
					<th>Type</th>
					<th>Turnaround Date</th>
					<th>Status</th>
					<th>Action</th>
					@if (Auth::user()->isAdmin())
					<th></th>
					@endif
				</tr>
			</thead>
			@foreach (Auth::user()->requests as $krequest)
				<tr>
					<td>{{ explode(' ',$krequest->created_at)[0] }}</td>
					<td>{{ $krequest->customer->first_name . " " . $krequest->customer->last_name }}</td>
					<td>{{ $krequest->insurance->name }}</td>
					<td>{{ $krequest->type->name }}</td>
					<td>{{ explode(' ',$krequest->turnaround_date)[0] }}</td>
					<td>{{ $krequest->status }}</td>
					<td>
						<a href="{{ action('RequestsController@edit', [$krequest->customer->id, $krequest->id]) }}" class="btn btn-primary">Process</a>
					</td>
					@if (Auth::user()->isAdmin())
						<td>
							{!! Form::open(['method' => 'DELETE', 'action' => ['RequestsController@destroy', $krequest->customer->id, $krequest->id], 'class' => 'deleteForm']) !!}
								<fieldset class="form-group"> 
									{!! Form::submit('Delete Request', ['class' => 'btn btn-danger']) !!}
								</fieldset>
							{!! Form::close() !!}
						</td>
					@endif
				</tr>
			@endforeach
		</table>
	@endunless
@stop

@section('footer')
	<script>
	    $(".deleteForm").on("submit", function(){
	        return confirm("Do you want to delete this item?");
	    });
	</script>
@stop
