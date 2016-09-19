@extends('layouts.layout')
@section('title')
	All Clients
@stop
@section('body')
	@foreach($clients as $client)
		<h1>{{$client->name}} {{$client->surname}}</h1>
		<h3>{{$client->last_login}}</h3>
	@endforeach
	{!! Form::input('text', 'ime') !!}
	{!! Form::input('text', 'prezime') !!}
	{!! Form::text('price', '50$', ['class' => "form-control", 'placeholder' => "Give a price"])!!}
	{!! Form::number('level', 10, ['max' => 20, 'min' => 10])!!}
@stop