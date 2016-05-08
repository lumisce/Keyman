@extends('layouts.app')
<link rel="stylesheet" href="/assets/css/requests.css">
<link rel="stylesheet" href="/assets/css/tablecard.css">
<link rel="stylesheet" href="/assets/css/account.css">

@section('content')
	<hr>
	<br />
	<div class="bgblue" style="display: inline-block;">
		<div style="margin:8px; width:50%; display: inline-flex;">
			<div>
				<div style="background-color: white; border-radius: 50%; width:76px;
					height:76px;font-size: 50px; color: rgb(233,130,51); text-align: center; font-family: 'Nav'; line-height: 76px; margin: 10px;">
					{{ $provider->name[0] }}
				</div>
			</div> 

			<div style="display:inline-table; float:left; margin: 10px 10px 10px 10px;">
				<div class="upper" style="font-size: 18px"> {{ $provider->name }} </div>
				{{ $provider->location }}<br />
				{{ $provider->email }} /
				{{ $provider->phone_num }}<br />
				@if (Auth::user()->isAdmin())
					<a id="editButton" href ="{{ action('ProvidersController@edit', [$provider->id]) }}" style="color:rgb(233,130,51); height: 20px;">
						 EDIT PROFILE
					</a>
				@endif
			</div>
		</div>

		<div style="margin-top: 5px; display: inline-block; float: right; width: 30px;z-index: 5;"></div>

	</div>

	<hr style="margin-top: 20px; padding-top: 10px; border-top: 0; border-bottom: 1px; background-color: rgb(233,130,51)";>
	<br />

	<div class= "form-group" style="display: inline-flex; margin-bottom: 0;">
			<h3 style="width: initial; font-size: 36px; margin: 0;margin-bottom: 10px;">Insurance Plans: </h3>
			<a href={{ action('InsurancesController@create', [$provider->id]) }}" style="text-align: center; margin-top: 1%;" class="btn addButton">
				<i>+ Add plan </i>
			</a>
	</div>

	@unless ($provider->insurances->isEmpty())
		<table class="table table-hover cards-table">
			<thead id = "providerTHead">
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Payment</th>
					<th></th>
				</tr>
			</thead>
			@foreach ($provider->insurances as $insurance)
				<tr id = "override">
					<td style="text-align: left;">{{ $insurance->name }}</td>
					<td style="text-align: left;">{{ $insurance->insuranceType ? $insurance->insuranceType->name : '' }}</td>
					<td>{{ $insurance->payment }}</td>
					<td id ="buttonContainer">
						<a href="{{ action('InsurancesController@edit', [$provider->id, $insurance->id]) }}" class="btn btn-primary">Edit</a>
					</td>
				</tr>
			@endforeach
		</table>
	@endunless
	<hr>
@stop

@section('footer')

    <script>
        var tables = $('.cards-table');
        var table_headers = [];
            tables.each(function() {
                var th = [];
                $(this).find('thead th').each(function() {
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