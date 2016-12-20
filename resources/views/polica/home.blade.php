@extends('layouts.app')

@section('content')
<script>
			   function tarifnagrupaJS(val) {
			        $.get('http://osiguranje-dev/baza/tarifnapodgrupa?Oznaka=' + val, function(data) {
			            console.log(data);
			            $('#tarifnapodgrupa').empty();
						
			            $.each(data, function(index,value){
						$('#tarifnapodgrupa').append(new Option(value, index));
			            });
			        });
			    }
</script>
@include('layouts.policaForm')
@endsection