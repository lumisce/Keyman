@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<link rel="stylesheet" href="/assets/css/tablecard.css">

<style>
li#requestsButton{
 	border-bottom-color: rgb(232,131,52);
 	background-color: #f3f3f3;
}
.row .table {
	margin-top: 10%;
}
</style>
@section('content')
	<hr>
	<b><h3>requests</h3></b>
	@include('requests._list')
@stop