@extends('layouts.app')

@section('content')
	<h1>Requests</h1>
	<hr>

	@unless ($requests->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Date Received</th>
					<th>Customer</th>
					<th>Insurance</th>
					<th>Request</th>
					<th>Turnaround Date</th>
					<th>Consultant</th>
					<th>Status</th>
					<th>Progress</th>
					<th>Action</th>
					<th></th>
					@if (Auth::user()->isAdmin())
					<th></th>
					@endif
				</tr>
			</thead>

			@foreach ($requests as $krequest)
				<tr>
					<td>{{ explode(' ',$krequest->created_at)[0] }}</td>
					<td><a href="{{ action('CustomersController@show', [$krequest->customer->id]) }}" class="">{{ $krequest->customer->first_name . ' ' . $krequest->customer->last_name . ', ' . $krequest->customer->middle_name  }}</a></td>
					<td>{{ $krequest->insurance->name }}</td>
					<td>{{ $krequest->type->name }}</td>
					<td>{{ explode(' ', $krequest->turnaround_date)[0] }}</td>
					<td>{{ $krequest->users()->first()->name }}</td>
					<td>
						@if (Carbon\Carbon::now()->startOfDay()->gt($krequest->turnaround_date))
							{{ 'OVERDUE' }}
						@elseif (Carbon\Carbon::now()->startOfDay()->eq($krequest->turnaround_date))
							{{ 'URGENT' }}
						@else
							{{ $krequest->status }}
						@endif
					</td>
					<td>{{ $krequest->users()->first()->pivot->progress }}</td>
					<td>
						@if ($krequest->status == 'ONGOING')
						<a href="{{ action('RequestsController@edit', [$krequest->customer->id, $krequest->id]) }}" class="btn btn-primary">Process</a>
						@endif
					</td>
					<td>
						@if ($krequest->status == 'PENDING' && Auth::id() == $krequest->users()->first()->id)
						{!! Form::open(['method' => 'PATCH', 'action' => ['RequestsController@complete', $krequest->customer->id, $krequest->id], 'class' => 'completeForm']) !!}
							<fieldset class="form-group"> 
								{!! Form::submit('Complete', ['class' => 'btn btn-success']) !!}
							</fieldset>
						{!! Form::close() !!}
						@endif
					</td>
					@if (Auth::user()->isAdmin())
						<td>
							{!! Form::open(['method' => 'DELETE', 'action' => ['RequestsController@destroy', $krequest->customer->id, $krequest->id], 'class' => 'deleteForm']) !!}
								<fieldset class="form-group"> 
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
	    $(".completeForm").on("submit", function(){
	        return confirm("Do you want to complete this request?");
	    });
	</script>
@stop