@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Izvještaji</div>
                @include('menus.mainMenu')

                <div class="panel-body">
                
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="{{ url('/izvjestaji/promet') }}">Promet</a></li>
                  <li role="presentation"><a href="{{ url('/izvjestaji/police') }}">Police</a></li>
                  <li role="presentation"><a href="{{ url('/izvjestaji/radnici') }}">Radnici</a></li>
                </ul>

                <div>
                <form action="{{ url('izvjestaji/promet') }}" method="get" >
                    {{Form::label('Odabir datuma:')}}
                    {{Form::date('datum')}}
                    {{ Form::hidden('hidden_source', 'datum') }}
                    <button type="submit" class="btn btn-primary btn-xs">Odaberi</button>
                    {{Form::close()}}
                </div>
                {{$datumstr}}
                <div>
                    <table>
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
                        </table>
                </div>
                <center>Paginacija</center>
                <center>{{ $policas->links() }}</center>


                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
