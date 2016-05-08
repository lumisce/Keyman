@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<link rel="stylesheet" href="/assets/css/tablecard.css">

<style>

    li#customersButton{
        border-bottom-color: rgb(232,131,52);
        background-color: #f3f3f3;
    }

    thead#customerTHEad > tr > th  {
        vertical-align: middle;
        font-weight: normal;
        border: 0;
    }

    .addButton {
        background-color: #fafafa;
        width: 100%;
    }

    .form-group {
        margin-left: -8px;
    }

</style>

@section('content')
    <hr>

	<h3><b>Customers</b></h3>

    <div class = "form-group" style="text-align: center">
        <a href="{{ action('CustomersController@create')}}" class="btn addButton"> 
            <i>+ Add Customers  </i>
        </a>
    </div>

	@unless ($customers->isEmpty())
    <div id="requestTHeadSort" class="dropdown" style="vertical-align: bottom; float: right; margin-top: 30px; margin-bottom: 8px; margin-right: 8px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sort<span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                
                <li>
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
                </li>

                <li>
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
                </li>

                <li>
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
                </li>

            </ul>
        </div>

    <table class="table table-hover cards-table">
		<thead id ="customerTHead">
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
                    <th></th>
				@endif
                
			</tr>

		</thead>

		@foreach ($customers as $customer)

			<tr id="override">

				<td>
                    <a href="{{ action('CustomersController@show', [$customer->id]) }}" class="">
                        {{ $customer->last_name  }}, {{ $customer->first_name  }} {{ $customer->middle_name[0]  }}.
                    </a>
                </td>
				<td>{{ $customer->email }}</td>
				<td>{{ $customer->phone_num }}</td>
				<td>{{ $customer->total_requests }}</td>
				@if (Auth::user()->isAdmin())
				    <td id="buttonContainer">
                        <a href="{{ action('CustomersController@edit', [$customer->id]) }}" class="btn btn-primary">
                            EDIT <i class ="fa fa-btn fa-edit fa-lg"></i>
                        </a>
                    </td>
				@endif

			</tr>

		@endforeach

	</table>
    <hr>
	@endunless

@stop

@section('footer')

    <script>

        var tables = $('.cards-table');
        var table_headers = [];
            tables.each(function() {
                var th = [];
                $(this).find('thead#customerTHead th').each(function() {
                th.push($(this).text());
            });
        table_headers.push(th);
        });

        tables.each(function(table) {
            var table_index = table;
            $(this).find('tbody tr').each(function() {
                $(this).find('td').each(function(column) {
                $(this).attr('data-label', table_headers[table_index][column]);
                });
            });
        });

    </script>
    
@stop

