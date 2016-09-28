<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
       
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Ugovaratelj</h4></div>

                <div class="panel-body">
                    {{Form::open(array('route' => 'polica', 'class' => 'form'))}}
                    <div class="form-group">
                    {{Form::label('ugovaratelj')}}
                    {{Form::text('ugovaratelj_id', null, array('required', 'class' => 'form-control', 'placeholder' => 'id ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Adresa:')}}
                    {{Form::text('ugovaratelj_adresa', null, array('required', 'class' => 'form-control', 'placeholder' => 'adresa ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Poštanski broj:')}}
                    {{Form::text('ugovaratelj_postbroj', null, array('required', 'class' => 'form-control', 'placeholder' => 'telefonski broj ugovaratelja'))}}
                    
                    </div>
                      <div class="form-group">
                    {{Form::label('Telefon:')}}
                    {{Form::text('ugovaratelj_telefon', null, array('required', 'class' => 'form-control', 'placeholder' => 'poštanski broj ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Naziv:')}}
                    {{Form::text('ugovaratelj_naziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv ugovaratelja'))}}
                    
                    </div>
                </div>
            </div>
           



        </div>

            
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Osiguranik</h4></div>

                <div class="panel-body">
                    {{Form::open(array('route' => 'polica', 'class' => 'form'))}}
                    <div class="form-group">
                    {{Form::label('osiguranik')}}
                    {{Form::text('osiguranik_id', null, array('required', 'class' => 'form-control', 'placeholder' => 'id ugovaratelja'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Adresa:')}}
                    {{Form::text('osiguranik_adresa', null, array('required', 'class' => 'form-control', 'placeholder' => 'adresa osiguranika'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Mjesto:')}}
                    {{Form::text('osiguranik_mjesto', null, array('required', 'class' => 'form-control', 'placeholder' => 'mjesto osiguranika'))}}
                    
                    </div>
                      <div class="form-group">
                    {{Form::label('Telefon:')}}
                    {{Form::text('osiguranik_telefon', null, array('required', 'class' => 'form-control', 'placeholder' => 'poštanski broj osiguranika'))}}
                    
                    </div>
                    <div class="form-group">
                    {{Form::label('Naziv:')}}
                    {{Form::text('osiguranik_naziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv osiguranika'))}}
                    
                    </div>
                </div>
            </div>
           


           
        </div>
        
      
            
        </div>
        <div class="col-md-5 col-md-offset-7">
            <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading"><h4>Premija</h4></div>
            </div>
          </div>
        </div>
    </div>
</div>