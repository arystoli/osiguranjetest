<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

</head>

<body>
	<div id='content'>
	<h2>@yield('title')</h2>
	@include('layouts.menu')
	@yield('body')
	</div>

</body>
</html>