@extends('/layouts.layout')

@section('title')
	About
@stop

@section('body')
	<h1>Test Naslov</h1>

	<p>{{$companyName}}</p>

	@if($bool)
		Hello
	@else
		No Hello!
	@endif

	@foreach($users as $user)
		{{$user}}<br>
	@endforeach

@stop


