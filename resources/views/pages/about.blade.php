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

	<h2>Auto Hrvatska about</h2>

@stop

<h3>Page bottom</h3>


