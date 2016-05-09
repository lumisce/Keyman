@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">

<style>

    li#adminButton{
        border-bottom-color: rgb(232,131,52);
        background-color: #f3f3f3;
    }

    li#insTypesButton{
        background-color: #f3f3f3;
    }

</style>
 

@section('content')
	<hr>
	<h3 style="margin-left: 5px">Insurance Types</h3>

	<div class = "form-group" style="text-align: center;">
		<a href="{{ action('TypesController@create' )}}" class="btn addButton">
			<i>+ Add Types </i>	
		</a>
	</div>

	<table class="table table-hover">
		<thead id ="insTypesTHead">
			<tr>
				<th>Insurance type</th>
				<th></th>
			</tr>
		</thead>

		@foreach ($types as $type)
			<tr id ="override">
			 	<td> {{ $type->name }}</td>
				<td><a href="{{ action('TypesController@edit', [$type->id]) }}" class="btn btn-primary">Edit</a></td>
			</tr>
		@endforeach

	</table>
	<hr>
@stop