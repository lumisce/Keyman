@extends('layouts.app')

<link rel="stylesheet" href="/assets/css/requests.css">
<style>
li#requestsButton{
 	border-bottom-color: rgb(232,131,52);
 	background-color: #f3f3f3;
 }
</style>

@section('content')
	<br />
	<br />
	<br />
	<br />
	<br /> 
	@include('requests._list')
@stop