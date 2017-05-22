@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">Blagajna Unos Novca
                </div>
                @include('menus.menuBlagajna')

                <div class="panel-body">

                <div class="container">
                        
                        @include('errors.list')
                        {{Form::open(array('action' => 'BlagajnaController@unosNovca', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('Odabir blagajne (osiguranja)')}}
                            <br>
                            {{Form::select('osiguranje', DB::table('blagajnas')->where('operater', $user->id)->orderBy('id')->pluck('osiguranje','osiguranje'), array('class' => 'form-control', 'placeholder' => 'Osiguranje'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Iznos dodan u blagajnu:')}}
                            {{Form::number('iznos', null, array('class' => 'form-control', 'placeholder' => 'iznos novca'))}}

                        </div>

                            <center><button type="submit">Dodaj novac</button></center></center>
                                {{Form::close()}}

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection