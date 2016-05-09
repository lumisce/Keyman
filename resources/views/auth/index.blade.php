@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<link rel="stylesheet" href="/assets/css/tablecard.css">

<style>

    li#adminButton{
        border-bottom-color: rgb(232,131,52);
        background-color: #f3f3f3;
    }
    li#usersButton{
        border-left-color: rgb(232,131,52);
        background-color: #f3f3f3;
    }

</style>


@section('content')
    <hr>

	<h3>Users 
	   @if (Auth::user()->isAdmin())
            <div class = "form-group" style="text-align:center;"><a href="{{ action('Auth\AuthController@showRegistrationForm')}}" class="btn addButton"><i>+ Add Users  </i></a></div>
	   @endif
	</h3>

    <div id="requestTHeadSort" class="dropdown" style="vertical-align:bottom; float:right; margin-top:30px;margin-bottom:8px; margin-right:8px;">
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
                @if ($sortby == 'is_admin' && $order == 'asc') {!!
                    link_to_action(
                        $sortMethod,
                        'Admin',
                        [
                            'sortby' => 'is_admin',
                            'order' => 'desc',
                        ]
                    )
                !!}
                @else {!!
                    link_to_action(
                        $sortMethod,
                        'Admin',
                        [
                            'sortby' => 'is_admin',
                            'order' => 'asc',
                        ]
                    )
                !!}
                @endif
            </li>
        </ul>
    </div>
	
	<table class="table table-hover cards-table">
		<thead id ="userTHead">
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
    				@if ($sortby == 'is_admin' && $order == 'asc') {!!
                        link_to_action(
                            $sortMethod,
                            'Admin',
                            [
                                'sortby' => 'is_admin',
                                'order' => 'desc',
                            ]
                        )
                    !!}
                    @else {!!
                        link_to_action(
                            $sortMethod,
                            'Admin',
                            [
                                'sortby' => 'is_admin',
                                'order' => 'asc',
                            ]
                        )
                    !!}
                	@endif
            	</th>

				<th></th>
			</tr>
		</thead>

		@foreach ($users as $user)

			<tr id ="override">
				<td><a href="{{ action('Auth\AuthController@show', [$user->id]) }}" class="">{{ $user->name }}</a></td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone_num }}</td>
				<td>{{ $user->isAdmin() ? 'Yes' : 'No' }}</td>
				<td id="buttonContainer">
    				{!! Form::open(['action' => ['Auth\AuthController@setAdmin', $user->id], 'class' => '']) !!}
    						{!! Form::submit($user->isAdmin() ? 'Unset Admin' : 'Set Admin', ['class' => 'btn btn-primary'], ['style' => 'max-width:80px']) !!}
    				{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
        
	</table>

    <hr>
@stop

@section('footer')
    <script>
        $(".updateForm").on("submit", function(){
            return confirm("Do you want to process this request?");
        });
        $(".completeForm").on("submit", function(){
            return confirm("Do you want to complete this request?");
        });
        $(".deleteForm").on("submit", function(){
            return confirm("Do you want to delete this item?");
        });

        var tables = $('.cards-table');
        // Create an array containing all table headers
        var table_headers = [];
            tables.each(function() {
                var th = [];
                $(this).find('thead th').each(function() {
                th.push($(this).text());
            });
        table_headers.push(th);

        });

        // Add a data-label attribute to each cell
        // with the value of the corresponding column header
        // Iterate through each table
        tables.each(function(table) {
            var table_index = table;
            // Iterate through each row
            $(this).find('tbody tr').each(function() {
            // Finally iterate through each column/cell
                $(this).find('td').each(function(column) {
                $(this).attr('data-label', table_headers[table_index][column]);
                });
            });
        });
    </script>
@stop