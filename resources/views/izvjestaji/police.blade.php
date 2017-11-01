@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="page-header">  
                <h1>Izvještaji</h1></div>
                @include('menus.mainMenu')

                <div class="panel-body">
                
                <ul class="nav nav-tabs">
                  <li role="presentation"><a href="{{ url('/izvjestaji/promet') }}">Promet</a></li>
                  <li role="presentation" class="active"><a href="{{ url('/izvjestaji/police') }}">Sve 
                  police</a></li>
                  <li role="presentation"><a href="{{ url('/izvjestaji/radnici') }}">Radnici</a></li>
                </ul>                                    
                </div>

                <div class="panel panel-default">

                    <div class="panel-heading">
                
                  
                    
                    <form action="{{ url('getAllPolicas') }}" method="get" >
                    {{Form::label('Sortiranje po Operateru:')}}
                    {{Form::select('operater', DB::table('users')->orderBy('id')->pluck('name','id'), array('class' => 'form-control', 'placeholder' => 'Osiguranje'))}}
                    {{ Form::hidden('hidden_source', 'operater') }}
                    <button type="submit" class="btn btn-primary btn-xs">Sortiraj</button>
                    {{Form::close()}}

                    </div>
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
        </div>
    </div>
</div>
@endsection
