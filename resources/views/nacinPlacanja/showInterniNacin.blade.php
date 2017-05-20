@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interni Načini Plaćanja
                </div>

                <div class="panel-heading">
                    @include('menus.adminMenu')
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-responsive table-bordered">
                    @foreach ($nacini as $nacin)
                        <tr>
                          <td>{{ $nacin->id }}</td>
                          <td>{{ $nacin->naziv }}</td>
                        <td><a href="{{ route('interni.delete', $nacin->id )}}">Obriši</a>
                        </tr>
                    
                        @endforeach
                        <tr>
                        <td>
                        {{Form::label('Unos novog')}}
                        </td>
                        <td>
                        {{Form::open(array('action' => 'InterniNacinPlacanjaController@store', 'class' => 'form'))}}

                        
                            
                            {{Form::text('naziv', null, array('class' => 'form-control', 'placeholder' => 'Naziv Internog plaćanja'))}}
                       
                        </td>
                        <td>
                        {{ Form::submit('Dodaj') }}
                        {{ Form::close()}}
                        </td>
                        </tr>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

