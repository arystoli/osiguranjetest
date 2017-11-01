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
                  <li role="presentation"><a href="{{ url('/izvjestaji/police') }}">Sve police</a></li>
                  <li role="presentation" class="active"><a href="{{ url('/izvjestaji/radnici') }}">Radnici</a></li>
                </ul>                                    
                </div>

                <div class="row">
                <div class="col-md-5"><form action="{{ url('izvjestaji/radnici') }}" method="get" >
                    {{Form::label('Odabir datuma:')}}
                    {{Form::date('datum')}}
                    {{ Form::hidden('hidden_source', 'datum_radnici') }}
                    <button type="submit" class="btn btn-primary btn-xs">Odaberi</button>
                    {{Form::close()}}
                    </form>
                </div>
                

                <div class="col-md-6"><strong class="text-primary">Izvještaj radnika na dan: {{$datumstr}}</strong></div>
                </div>


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
                       
                        </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
