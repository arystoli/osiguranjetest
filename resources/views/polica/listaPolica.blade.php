@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Police |
                
                  
                    <a class="nav-link" href="{{ url('/home') }}"> Home  <span class="sr-only">(current)</span></a>
                  
                    |
                    <a class="nav-link" href="{{ url('/getAllPolicas') }}"> Pregled polica </a>
                    |
                  
                    <a class="nav-link" href="{{ url('/polica') }}"> Izrada Police </a>
                    
                  
    
                </div>
            </div>

            <div class="panel panel-default">
                
                
                  
                    <a class="nav-link" href="{{ url('/home') }}"> Home  <span class="sr-only">(current)</span></a>
                  
                    |
                    <a class="nav-link" href="{{ url('/getAllPolicas') }}"> Pregled polica </a>
                    |
                  
                    <a class="nav-link" href="{{ url('/polica') }}"> Izrada Police </a>
                    
                  
    
                
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="container">
                        <table class="table table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Naziv Osiguranika</th>
                        <th>Ime Osiguranika</th>
                        <th>Registracija</th>
                        <th>Marka</th>
                        <th>Iznos</th>
                        <th>Nadzornik</th>
                        <th>Dobavljač</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ($policas as $polica)
                        <tr>
                          <td>{{ $polica->id }}</td>
                          <td>{{ $polica->osiguranikNaziv }}</td>
                          <td>{{ $polica->osiguranikIme }}</td>
                          <td>{{ $polica->RegistarskaOznaka }}</td>
                          <td>{{ $polica->Marka }}</td>
                          <td>{{ $polica->Premija }}</td>
                          <td>{{ $polica->nadzornikTehnicki }}</td>
                          @if ($polica->interniDobavljac != 0)
                            <td>{{ $polica->interniDobavljac }}</td>
                          @else
                            <td>{{ $polica->eksterniDobavljac }}</td>
                          @endif

                        </tr>
                          
                        @endforeach
                        </tbody>
                        </table>
                    </div>

                    <center>{{ $policas->links() }}</center>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
