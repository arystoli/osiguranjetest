@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administracija |
                
                  
                    <a class="nav-link" href="{{ url('/home') }}"> Home  <span class="sr-only">(current)</span></a>

                    |
                  
                  
                    <a class="nav-link" href="{{ url('/getAllPolicas') }}"> Pregled polica </a>

                    |
                 
                  
                    <a class="nav-link" href="{{ url('/polica') }}"> Izrada Police </a>

                    |

                    <a class="nav-link" href="{{ url('/blagajna') }}"> Blagajna </a>
                    
                  
    
                </div>



                <div class="panel-body">
			    
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
