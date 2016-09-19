@extends('layouts.layout')
@section('title')
Showing Single Client
@stop

@section('body')
	<h2>{{$client->name}}</h2>
	<h3>{{$client->surname}}</h3>

	<a href="#">Edit</a>
	{!!Form::open([
		'method' => 'delete',
		'route' => 'client.destroy'])!!}
		{!!Form::submit('Delete')!!}
	<a href="{{route('client.destroy', $client->id)}}">Delete</a>	
	
	{!!Form::close()!!}
@stop