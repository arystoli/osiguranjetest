@extends('layouts.layout')
@section('title')
	All Clients
@stop
@section('body')
	<a href="{{route('client.create')}}">Create new Client</a>

	@foreach($clients as $client)
		<h1>{{$client->name}} {{$client->surname}}</h1>
		<h3>{{$client->last_login}}</h3>
	@endforeach
	
@stop