

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

            <div class="panel-group">
                <div class="panel panel-primary">

                    <div class="panel-heading"><h4>Ugovaratelj</h4>
                    <button class="btn btn-primary btn-sm" aria-pressed="false" onclick="kopirajVrijednosti()">Kopiraj vrijednosti u osiguranika </button>
                    </div>

                    <div class="panel-body">

                        @include('errors.list')
                        {{Form::open(array('route' => 'polica', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('ugovaratelj')}}
                            {{Form::text('ugovaratelj_id', null, array('class' => 'form-control', 'placeholder' => 'id ugovaratelja'))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Vrsta Osobe:')}}
                            {{Form::select('ugovarateljVrsta', DB::table('vrstaosobe')->orderBy('ID')->pluck('Naziv','ID'), array('class' => 'form-control', 'placeholder' => 'vrsta ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Naziv:')}}
                            {{Form::text('ugovarateljNaziv', null, array('class' => 'form-control', 'placeholder' => 'naziv ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Ime:')}}
                            {{Form::text('ugovarateljIme', null, array('class' => 'form-control', 'placeholder' => 'Ime ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Prezime:')}}
                            {{Form::text('ugovarateljPrezime', null, array('class' => 'form-control', 'placeholder' => 'Prezime ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('OIB:')}}
                            {{Form::text('ugovarateljOib', null, array('required', 'class' => 'form-control', 'placeholder' => 'Oib ugovaratelja', 'maxlength' => 13))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Datum Rođenja:')}}
                            {{Form::date('ugovarateljDatumRodjenja', null, array('class' => 'form-control', 'placeholder' => 'Datum ugovaratelja'))}}

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
                            {{Form::text('ugovarateljUlica', null, array('class' => 'form-control', 'placeholder' => 'adresa ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Kućni broj:')}}
                            {{Form::text('ugovarateljKucniBroj', null, array('class' => 'form-control', 'placeholder' => 'kucni broj ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Poštanski broj:')}}
                            {{Form::text('ugovarateljPostanskiBroj', null, array('class' => 'form-control', 'placeholder' => 'Ulica ugovaratelja'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Naselje:')}}
                            
                            
                            {{Form::select('ugovarateljNaseljeOznaka', DB::table('naselje')->orderBy('Naziv')->pluck('Naziv', 'Oznaka'), array('class' => 'form-control', 'placeholder' => 'Naselje ugovaratelja'))}}

                        </div>

                        

                        <div class="form-group">
                            {{Form::label('Telefon:')}}
                            {{Form::text('ugovarateljTelefon', null, array('class' => 'form-control', 'placeholder' => 'poštanski broj ugovaratelja'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Email:')}}
                            {{Form::text('ugovarateljEmail', null, array('class' => 'form-control', 'placeholder' => 'Email ugovaratelja'))}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="panel-group">
                <div class="panel panel-primary">

                    <div class="panel-heading" name="prekopiranoUOsiguranika"><h4>Osiguranik</h4>
                    </div>

                    <div class="panel-body">
                        {{Form::open(array('route' => 'polica', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('osiguranik')}}
                            {{Form::text('osiguranik_id', null, array('class' => 'form-control', 'placeholder' => 'id osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Vrsta Osobe:')}}
                            {{Form::select('osiguranikVrsta', DB::table('vrstaosobe')->orderBy('ID')->pluck('Naziv','ID'), array('class' => 'form-control', 'placeholder' => 'vrsta osiguranika'))}}

                        <div class="form-group">
                            {{Form::label('Naziv:')}}
                            {{Form::text('osiguranikNaziv', null, array('class' => 'form-control', 'placeholder' => 'naziv osiguranika'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Ime:')}}
                            {{Form::text('osiguranikIme', null, array('class' => 'form-control', 'placeholder' => 'Ime osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Prezime:')}}
                            {{Form::text('osiguranikPrezime', null, array('class' => 'form-control', 'placeholder' => 'Prezime osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('OIB:')}}
                            {{Form::text('osiguranikOib', null, array('class' => 'form-control', 'placeholder' => 'Oib osiguranika', 'maxlength' => 13))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Datum Rođenja:')}}
                            {{Form::date('osiguranikDatumRodjenja', null, array('class' => 'form-control', 'placeholder' => 'Datum osiguranika'))}}

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
                            {{Form::text('osiguranikUlica', null, array('class' => 'form-control', 'placeholder' => 'adresa osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Kućni broj:')}}
                            {{Form::text('osiguranikKucniBroj', null, array('class' => 'form-control', 'placeholder' => 'kucni broj osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Poštanski broj:')}}
                            {{Form::text('osiguranikPostanskiBroj', null, array('class' => 'form-control', 'placeholder' => 'postanski broj osiguranika'))}}

                        </div>
                       
                        <div class="form-group">
                            {{Form::label('Naselje:')}}
                            {{Form::select('osiguranikNaseljeOznaka', DB::table('naselje')->orderBy('Naziv')->pluck('Naziv', 'Oznaka'), array('class' => 'form-control', 'placeholder' => 'Naselje osiguranika'))}}

                        </div>

                        

                        <div class="form-group">
                            {{Form::label('Telefon:')}}
                            {{Form::text('osiguranikTelefon', null, array('class' => 'form-control', 'placeholder' => 'poštanski broj osiguranika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Email:')}}
                            {{Form::text('osiguranikEmail', null, array('class' => 'form-control', 'placeholder' => 'Email osiguranika'))}}

                        </div>

                        <div class="form-group">
                        <button type="submit">Dalje</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    