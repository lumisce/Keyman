@extends('layouts.app')

@section('content')
	<h1>Request Types <a href="{{ action('RequestTypesController@create' )}}" class="btn btn-primary">Add</a></h1>
	<hr>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Ideal Turnaround</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($types as $type)
			<tr>
				<td>{{ $type->name }}</td>
				<td>{{ $type->ideal_turnaround }} days</td>
				<td><a href="{{ action('RequestTypesController@edit', [$type->id]) }}" class="btn btn-primary">Edit</a></td>
			</tr>
		@endforeach
	</table>
@stop