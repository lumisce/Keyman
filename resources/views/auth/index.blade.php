@extends('layouts.app')

@section('content')
	<h1>Users 
	@if (Auth::user()->isAdmin())
		<a href="{{ action('Auth\AuthController@showRegistrationForm')}}" class="btn btn-primary">Add</a>
	@endif
	</h1>
	<hr>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Admin</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($users as $user)
			<tr>
				<td><a href="{{ action('Auth\AuthController@show', [$user->id]) }}" class="">{{ $user->name }}</a></td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone_num }}</td>
				<td>{{ $user->isAdmin() ? 'Yes' : 'No' }}</td>
				<td>
				{!! Form::open(['action' => ['Auth\AuthController@setAdmin', $user->id], 'class' => '']) !!}
					<fieldset class="form-group"> 
						{!! Form::submit($user->isAdmin() ? 'Unset Admin' : 'Set Admin', ['class' => 'btn btn-primary']) !!}
					</fieldset>
				{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>
@stop