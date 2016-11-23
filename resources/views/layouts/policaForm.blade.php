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
                            {{Form::label('Naziv:')}}
                            {{Form::text('ugovarateljNaziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv ugovaratelja'))}}

                        </div>
                          <div class="form-group">
                            {{Form::label('Ime:')}}
                            {{Form::text('ugovarateljIme', null, array('required', 'class' => 'form-control', 'placeholder' => 'Ime ugovaratelja'))}}

                        </div>

                          <div class="form-group">
                            {{Form::label('Prezime:')}}
                            {{Form::text('ugovarateljPrezime', null, array('required', 'class' => 'form-control', 'placeholder' => 'Prezime ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('OIB:')}}
                            {{Form::text('ugovarateljOib', null, array('required', 'class' => 'form-control', 'placeholder' => 'Oib ugovaratelja'))}}

                        </div>


                         <div class="form-group">
                            {{Form::label('Datum Rođenja:')}}
                            {{Form::text('ugovarateljDatumRodjenja', null, array('required', 'class' => 'form-control', 'placeholder' => 'Datum ugovaratelja'))}}

                        </div>
                         <div class="form-group">
                            {{Form::label('Spol:')}}
                            {{Form::radio('ugovarateljSpolOznaka', 'm')}}
                            {{Form::radio('ugovarateljSpolOznaka', 'z')}}

                        </div>

                      
                        <div class="form-group">
                            {{Form::label('Ulica:')}}
                            {{Form::text('ugovarateljUlica', null, array('required', 'class' => 'form-control', 'placeholder' => 'adresa ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Poštanski broj:')}}
                            {{Form::text('ugovarateljPostanskiBroj', null, array('required', 'class' => 'form-control', 'placeholder' => 'telefonski broj ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Telefon:')}}
                            {{Form::text('ugovarateljTelefon', null, array('required', 'class' => 'form-control', 'placeholder' => 'poštanski broj ugovaratelja'))}}

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
                        <div class="form-group">
                            {{Form::label('Naziv:')}}
                            {{Form::text('osiguranik_naziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::text('osiguranikOib', null, array('required', 'class' => 'form-control', 'placeholder' => 'OIB osiguranika'))}}
                        </div>
                    </div>
                </div>




            </div>


            
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Premija</h4>
                    </div>
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
                            <button type="submit">Dalje</button>
                            {{Form::close()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>