@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<link rel="stylesheet" href="/assets/css/tablecard.css">
<link rel="stylesheet" href="/assets/css/account.css">
 
@section('content')

<hr>

<br />

<div class="bgblue" style="display:inline-block;">
	<div style="margin:8px; width:50%; display:inline-flex;">
		<div>
			<div style="background-color:white; border-radius:50%; width:76px;
				height:76px; font-size:50px; color:rgb(233,130,51); text-align:center; font-family:'Nav';line-height:76px; margin:10px;">
				{{ $user->name[0] }}
			</div>
		</div> 

		<div style="display:inline-table; float:left; margin:20px 10px 10px 10px;">
			<div class="upper" style="font-size:18px"> 
				{{ $user->name }}
			</div>
			{{ $user->email }}<br />
			{{ $user->phone_num }}<br />
		</div>
	</div>
	<div style="margin-top:5px; display:inline-block; float:right; width:30px; z-index:5;"></div>
</div>

@include('requests._list')

<hr>

@stop