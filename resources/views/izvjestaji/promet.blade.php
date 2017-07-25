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

                <div class="row">
                <div class="col-md-5"><form action="{{ url('izvjestaji/promet') }}" method="get" >
                    {{Form::label('Odabir datuma:')}}
                    {{Form::date('datum')}}
                    {{ Form::hidden('hidden_source', 'datum') }}
                    <button type="submit" class="btn btn-primary btn-xs">Odaberi</button>
                    {{Form::close()}}
                    </form>
                </div>
                

                <div class="col-md-6"><strong class="text-primary">Promet po datumu: {{$datumstr}}</strong></div>
                </div>
                
                <div>
                    <!--  ##TESTNI DIO ZA PRINT DOBIVENIH POLICA PO DATUMU
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
                        </table>     -->
                </div>
                <br>
                @if(isset($externiNaciniPlacanja))
                <div class="row">
                <div class="col-md-4 col-md-offset-1 panel panel-info">
                <div class="panel-heading"><center><strong>Externi načini plaćanja</strong></center></div>
                <div class="panel-body">
                @foreach ($externiNaciniPlacanja as $enp => $value)
                  <br>
                  {{ $enp }}: 
                  <strong>{{ $value }}kn</strong>
                @endforeach                
                </div>                
                
                
                </div>


                <div class="col-md-4 col-md-offset-1 panel panel-info">
                <div class="panel-heading"><cemter><strong>Interni načini plaćanja</div></strong></cemter>
                <div class="panel-body">
                @foreach ($interniNacinPlacanja as $inp => $value)
                  <br>
                  {{ $inp }}: 
                  <strong>{{ $value }}kn</strong>
                @endforeach
                </div>
                
                
                
                
                <center>{{ $policas->links() }}</center>
                </div>
                @endif

                </div>
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
