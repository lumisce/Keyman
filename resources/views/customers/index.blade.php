@extends('layouts.app')

@section('content')
	<h1>Customers <a href="{{ action('CustomersController@create')}}" class="btn btn-primary">Add</a></h1>
	<hr>

	@unless ($customers->isEmpty())
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
					<th>
					@if ($sortby == 'requests' && $order == 'asc') {!!
                        link_to_action(
                            $sortMethod,
                            'Requests',
                            [
                                'sortby' => 'requests',
                                'order' => 'desc',
                            ]
                        )
                    !!}
                    @else {!!
                        link_to_action(
                            $sortMethod,
                            'Requests',
                            [
                                'sortby' => 'requests',
                                'order' => 'asc',
                            ]
                        )
                    !!}
                	@endif
                	</th>
					@if (Auth::user()->isAdmin())
					<th>Action</th>
					@endif
				</tr>
			</thead>

			@foreach ($customers as $customer)
				<tr>
					<td><a href="{{ action('CustomersController@show', [$customer->id]) }}" class="">{{ $customer->fullName }}</a></td>
					<td>{{ $customer->email }}</td>
					<td>{{ $customer->phone_num }}</td>
					<td>{{ $customer->total_requests }}</td>
					@if (Auth::user()->isAdmin())
						<td><a href="{{ action('CustomersController@edit', [$customer->id]) }}" class="btn btn-primary">Edit</a></td>
					@endif
				</tr>
			@endforeach
		</table>
	@endunless
@stop