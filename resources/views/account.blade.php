@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<style>
thead {
	background-color: rgb(233,130,51);
}
.bgblue {
	background-color: rgb(0,77,134);
	color: white;
	font-size: 13px;
}
.row .table {
	margin: 0;
}

ul {
	display:inline-flex;  
	list-style: none;
	padding: 0;
}

li {
	padding: 8px 15px;
}

.upper {
	text-transform: uppercase;
	font-size: 15px;
}


</style>

@section('content')
<div style="margin: 50px 0 4px 0" class ="row bgblue">
	<ul style="margin-bottom: 0">
		<li>
			<div style="background-color: white; border-radius: 50%; width:58px;
				height:58px;font-size: 38px; color: rgb(233,130,51); text-align: center; font-family: 'Nav';">
				{{ Auth::user()->name[0] }}
			</div>
		</li> 

		<li style="display:inline-table;"><div class="upper"> {{ Auth::user()->name }} </div>
			{{ Auth::user()->email }}<br />
			{{ Auth::user()->phone_num }}<br />
		</li/>
	<ul style="margin:50px 0 4px;text-align: right;" class="row bgblue">
		<li style="text-align: right">
			<br />
			<a  href ="{{ action('Auth\AuthController@edit', [Auth::user()->id])}}" class="btn btn-primary">Edit Account</a>
		</li>
	</ul>
</div>
	@include('requests._list')
@stop