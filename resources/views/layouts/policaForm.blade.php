<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

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
                            {{Form::text('ugovarateljOib', null, array('required', 'class' => 'form-control', 'placeholder' => 'Oib ugovaratelja', 'maxlength' => 13))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Datum Rođenja:')}}
                            {{Form::date('ugovarateljDatumRodjenja', null, array('required', 'class' => 'form-control', 'placeholder' => 'Datum ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Spol:')}}
                            {{Form::label('M')}}
                            {{Form::radio('ugovarateljSpolOznaka', 'm')}}
                            {{Form::label('Ž')}}
                            {{Form::radio('ugovarateljSpolOznaka', 'z')}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Ulica:')}}
                            {{Form::text('ugovarateljUlica', null, array('required', 'class' => 'form-control', 'placeholder' => 'adresa ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Poštanski broj:')}}
                            {{Form::text('ugovarateljKucniBroj', null, array('required', 'class' => 'form-control', 'placeholder' => 'Ulica ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Naselje:')}}
                            {{Form::text('ugovarateljNaselje', null, array('required', 'class' => 'form-control', 'placeholder' => 'Naselje ugovaratelja'))}}

                        </div>

                        

                        <div class="form-group">
                            {{Form::label('Telefon:')}}
                            {{Form::text('ugovarateljTelefon', null, array('required', 'class' => 'form-control', 'placeholder' => 'poštanski broj ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Email:')}}
                            {{Form::text('ugovarateljEmail', null, array('required', 'class' => 'form-control', 'placeholder' => 'Email ugovaratelja'))}}

                        </div>
                        




                    </div>
                </div>




            </div>

        </div>

        <div class="col-md-6">

            <div class="panel-group">
                <div class="panel panel-primary">

                    <div class="panel-heading"><h4>Osiguranik</h4></div>

                    <div class="panel-body">
                        {{Form::open(array('route' => 'polica', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('osiguranik')}}
                            {{Form::text('osiguranik_id', null, array('required', 'class' => 'form-control', 'placeholder' => 'id osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Naziv:')}}
                            {{Form::text('osiguranikNaziv', null, array('required', 'class' => 'form-control', 'placeholder' => 'naziv osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Ime:')}}
                            {{Form::text('osiguranikIme', null, array('required', 'class' => 'form-control', 'placeholder' => 'Ime osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Prezime:')}}
                            {{Form::text('osiguranikPrezime', null, array('required', 'class' => 'form-control', 'placeholder' => 'Prezime osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('OIB:')}}
                            {{Form::text('osiguranikOib', null, array('required', 'class' => 'form-control', 'placeholder' => 'Oib osiguranika', 'maxlength' => 13))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Datum Rođenja:')}}
                            {{Form::text('osiguranikDatumRodjenja', null, array('required', 'class' => 'form-control', 'placeholder' => 'Datum osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Spol:')}}
                            {{Form::label('M')}}
                            {{Form::radio('osiguranikSpolOznaka', 'm')}}
                            {{Form::label('Ž')}}
                            {{Form::radio('osiguranikSpolOznaka', 'z')}}

                        </div>

                        
                        <div class="form-group">
                            {{Form::label('Ulica:')}}
                            {{Form::text('osiguranikUlica', null, array('required', 'class' => 'form-control', 'placeholder' => 'adresa osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Poštanski broj:')}}
                            {{Form::text('osiguranikKucniBroj', null, array('required', 'class' => 'form-control', 'placeholder' => 'Ulica osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Naselje:')}}
                            {{Form::text('osiguranikNaselje', null, array('required', 'class' => 'form-control', 'placeholder' => 'Naselje osiguranika'))}}

                        </div>

                        

                        <div class="form-group">
                            {{Form::label('Telefon:')}}
                            {{Form::text('osiguranikTelefon', null, array('required', 'class' => 'form-control', 'placeholder' => 'poštanski broj osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Email:')}}
                            {{Form::text('osiguranikEmail', null, array('required', 'class' => 'form-control', 'placeholder' => 'Email osiguranika'))}}

                        </div>
                        

                        

                        
                    </div>
                </div>




            </div>
            

        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
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
        