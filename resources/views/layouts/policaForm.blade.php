<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Izrada Police</div>
                    {{Form::open(array('route' => 'polica'))}}
                    {{Form::text('osiguranik')}}
                    {{Form::submit('pošalji')}}
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>