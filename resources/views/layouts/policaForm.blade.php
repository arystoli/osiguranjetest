<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Izrada Police</h3></div>

                <div class="panel-body">
                    {{Form::open(array('route' => 'polica', 'class' => 'form'))}}
                    <div class="form-group">
                    {{Form::label('ugovaratelj')}}
                    {{Form::text('ugovaratelj_id', null, array('required', 'class' => 'form-control', 'placeholder' => 'id ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Naziv:')}}
                    {{Form::text('ugovaratelj_naziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Adresa:')}}
                    {{Form::text('ugovaratelj_adresa')}}
                    
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="form-group">
                    {{Form::label('Osiguranik')}}
                    {{Form::text('osiguranik')}}
                    {{Form::submit('pošalji')}}
                    {{Form::close() }}
                    </div>
                </div>
            </div>
        </div>
            
        </div>
    </div>
</div>