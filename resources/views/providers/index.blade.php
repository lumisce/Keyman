@extends('layouts.app')

@section('content')
	<h1>Providers 
	@if (Auth::user()->isAdmin())
		<a href="{{ action('ProvidersController@create')}}" class="btn btn-primary">Add</a>
	@endif
	</h1>
	<hr>

	@unless ($providers->isEmpty())
		<table class="table table-hover">
			<thead>
				<tr>
					<th>
					@if ($sortby == 'name' && $order == 'asc') {!!
	                    link_to_action(
	                        $sortMethod,
	                        'Name',
	                        [
	                            'sortby' => 'name',
	                            'order' => 'desc',
	                        ]
	                    )
	                !!}
	                @else {!!
	                    link_to_action(
	                        $sortMethod,
	                        'Name',
	                        [
	                            'sortby' => 'name',
	                            'order' => 'asc',
	                        ]
	                    )
	                !!}
	            	@endif
					</th>
					<th>
					@if ($sortby == 'email' && $order == 'asc') {!!
	                    link_to_action(
	                        $sortMethod,
	                        'Email',
	                        [
	                            'sortby' => 'email',
	                            'order' => 'desc',
	                        ]
	                    )
	                !!}
	                @else {!!
	                    link_to_action(
	                        $sortMethod,
	                        'Email',
	                        [
	                            'sortby' => 'email',
	                            'order' => 'asc',
	                        ]
	                    )
	                !!}
	            	@endif
	            	</th>
					<th>Phone</th>
					@if (Auth::user()->isAdmin())
					<th>Action</th>
					@endif
				</tr>
			</thead>
			
			@foreach ($providers as $provider)
				<tr>
					<td><a href="{{ action('ProvidersController@show', [$provider->id]) }}" class="">{{ $provider->name  }}</a></td>
					<td>{{ $provider->email }}</td>
					<td>{{ $provider->phone_num }}</td>
					@if (Auth::user()->isAdmin())
						<td><a href="{{ action('ProvidersController@edit', [$provider->id]) }}" class="btn btn-primary">Edit</a></td>
					@endif
				</tr>
			@endforeach
		</table>
	@endunless
@stop