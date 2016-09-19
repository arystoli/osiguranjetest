@extends('layouts.layout')
@section('title')
Create new client
@stop

@section('body')
	{!!Form::open(['route' => 'client.store'])!!}
	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', null, ['placeholder' => "Enter Name"])!!}
	<br>
	{!!Form::label('surname', 'Surname')!!}
	{!!Form::text('surname', null, ['placeholder' => "Enter Surname"])!!}
	<br>

	{!!Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard'],
    'Dogs' => ['spaniel' => 'Spaniel'],
]);!!}
	{!!Form::submit('Create')!!}
	{!!Form::close()!!}
	
	
@stop