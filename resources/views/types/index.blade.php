@extends('layouts.app')

@section('content')
	<h1>Insurance Types <a href="{{ action('TypesController@create')}}" class="btn btn-primary">Add</a></h1>
	<hr>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($types as $type)
			<tr>
				<td>{{ $type->name }}</td>
				<td><a href="{{ action('TypesController@edit', [$type->id]) }}" class="btn btn-primary">Edit</a></td>
			</tr>
		@endforeach
	</table>
@stop