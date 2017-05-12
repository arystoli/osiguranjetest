@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">Blagajna Pregled
                </div>
                @include('menus.menuBlagajna')

                <div class="panel-body">

                <div class="container">
                        
                        @include('errors.list')
                        {{Form::open(array('action' => 'BlagajnaController@store', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('Odabir blagajne (osiguranja)')}}
                            <br>
                            {{Form::select('osiguranje', DB::table('blagajnas')->where('operater', $user->id)->orderBy('id')->pluck('osiguranje','osiguranje'), array('class' => 'form-control', 'placeholder' => 'Osiguranje'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Interni način plaćanja')}}
                            <br>
                            {{Form::select('nacin_placanja', DB::table('interninacinplacanja')->orderBy('id')->pluck('naziv','id'), array('class' => 'form-control', 'placeholder' => 'Način plaćanja'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Iznos Naplaćen od strane korisnika:')}}
                            {{Form::number('iznos_naplacen', null, array('class' => 'form-control', 'placeholder' => 'Naplaćen iznos u kn'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Cijena Police / Iznos police:')}}
                            {{Form::number('iznos_polica', null, array('class' => 'form-control', 'placeholder' => 'Iznos Police u kn'))}}

                        </div>

                        

                      

                            <center><button type="submit">Dalje</button></center></center>
                                {{Form::close()}}

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection