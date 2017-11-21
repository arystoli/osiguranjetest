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
                        <th>Zaposlenik</th>
                        <th>Iznos</th>
                        <th>Broj Polica</th>                        
                        <th>Gotovina</th>
                        <th>Kartice</th>                        
                        </tr>
                        </thead>
                        <tbody>
                            @if( !empty($userData))
                                @php
                                    foreach($userData as $user => $values){
                                        foreach($values as $k => $v){

                                        }   

                                }
                                $keys1 = array_keys($userData);
                                foreach($keys1 as $key1){
                                    //$keys2 = array_keys($userData[$keys1[$key1]]);
                                    $userName = $userData[$key1]['userName'];
                                    $day = $userData[$key1]['day'];
                                    $month = $userData[$key1]['month'];
                                    $day_inp = $day['inp'];
                                    $month_inp = $month['inp'];
                                    echo "inp br polica" . $month_inp['Gotovina']['brPolica'];
                                    var_dump($userName);
                                    var_dump($day);                                    
                                    var_dump($month);
                                
                            }
                                
                                @endphp

                                 @foreach ($userData as $user => $values)                                   
                                <tr>                                    
                                    <td>{{ $values['userName'] }}</td>
                                    @foreach ($values['month'] as $k => $v)
                                                                        
                                    @endforeach                           
                                </tr>
                                  
                                @endforeach
                        @endif
                        </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
