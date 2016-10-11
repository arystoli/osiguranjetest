@extends('layouts.layout')
@section('title')
Showing Single Client
@stop

@section('body')
	<h2>{{$client->name}}</h2>
	<h3>{{$client->surname}}</h3>

	<a href="#">Edit</a>
	

@stop