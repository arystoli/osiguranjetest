

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

            <div class="panel-group">
                <div class="panel panel-primary">

                    <div class="panel-heading"><h4>Polica</h4>
                    
                    </div>

                    <div class="panel-body">

                        @include('errors.list')
                        {{Form::open(array('route' => 'polica', 'class' => 'form'))}}

                        <div class="form-group">
                            {{Form::label('Ranije Osiguravajuće Društvo')}}
                            {{Form::text('RanijeOsiguravajuceDrustvoSifra', null, array('class' => 'form-control', 'placeholder' => 'šifra'))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Broj Ranije Police:')}}
                            {{Form::text('BrojRanijePolice', null, array('class' => 'form-control', 'placeholder' => 'broj police'))}}


                        </div>

                        <div class="form-group">
                            {{Form::label('Registarska oznaka:')}}
                            {{Form::text('RegistarskaOznaka', null, array('class' => 'form-control', 'placeholder' => 'registracija vozila'))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Marka:')}}
                            {{Form::text('Marka', null, array('class' => 'form-control', 'placeholder' => 'Marka vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Broj Šasije:')}}
                            {{Form::text('BrojSasije', null, array('class' => 'form-control', 'placeholder' => 'Šasija vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Godina Proizvodnje:')}}
                            {{Form::text('GodinaProizvodnje', null, array('required', 'class' => 'form-control', 'placeholder' => 'godina proizvodnje', 'maxlength' => 4))}}

                        </div>


                        <div class="form-group">
                            {{Form::label('Snaga:')}}
                            {{Form::number('Snaga', null, array('class' => 'form-control', 'placeholder' => 'snaga vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Zapremina:')}}
                            {{Form::number('Zapremina', null, array('class' => 'form-control', 'placeholder' => 'zapremina vozila'))}}

                        </div>

                         <div class="form-group">
                            {{Form::label('Nosivost:')}}
                            {{Form::number('Nosivost', null, array('class' => 'form-control', 'placeholder' => 'nosivost vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Broj putnika:')}}
                            {{Form::number('BrojPutnika', null, array('class' => 'form-control', 'placeholder' => 'broj putnika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Boja:')}}
                            {{Form::number('Boja', null, array('class' => 'form-control', 'placeholder' => 'boja vozila'))}}

                        </div>

                       




                    </div>
                </div>




            </div>

        </div>

        

                        

                        
                   




            
            

        
    
   
        <div class="col-md-6">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Vozilo</h4>
                    </div>
                    <div class="panel-body">
                        

                        <div class="form-group">
                            {{Form::label('Tarifna Grupa:')}}
                            

                            <select name="TarifnaGrupaOznaka" onchange="tarifnagrupaJS(this.value)"><option value="01">Osobno vozilo</option><option value="02">Teretno vozilo</option><option value="03">Autobus</option><option value="04">Motocikl, moped</option><option value="05">Traktor</option><option value="06">Radni stroj</option><option value="07">Priključno vozilo</option><option value="12">Mot. vozila izvozne pl.</option><option value="13">Vozila s prenosivim reg. pločicama</option></select>
                           
                        </div>

                        <div class="form-group">
                            {{Form::label('Tarifna Podgrupa:')}}
                            <select id="TarifnaPodGrupaOznaka" class="form-control" name="TarifnaPodGrupaOznaka"><option value="01">   do 44 kW</option><option value="02">preko 44 -  55 kW</option><option value="03">preko 55 -  74 kW</option><option value="04">preko 74 -  88 kW</option><option value="05">preko 88 - 110 kW</option><option value="06">preko 110- 150 kW</option><option value="07">preko 150 kW</option></select>
                            </select>

                        </div>

                        <div class= "form-group">
                            {{Form::label('Tarifni popust:')}}
                            <select id="TarifniPopustOznaka" class="form-control" name="TarifniPopustOznaka"><option value="P1">za tjelesno oštećenje 15%</option><option value="P2">za tjelesno oštećenje 20%</option><option value="P5">za starodobna vozila 50%</option>
                            </select>

                        </div>

                        <div class= "form-group">
                            {{Form::label('Tarifni doplatak:')}}
                            <select id="TarifniDoplatakOznaka" class="form-control" name="TarifniDoplatakOznaka"><option value="D1">za taxi vozila - pravna osoba</option>
                            </select>

                        </div>

                        <div class="form-group">
                            {{Form::label('Osigurana svota:')}}
                            {{Form::number('OsiguranaSvota', null, array('class' => 'form-control', 'placeholder' => 'osigurana svota'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Početak osiguranja:')}}
                            {{Form::date('DatumPocetkaOsiguranja', null, array('class' => 'form-control', 'placeholder' => ''))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Istek osiguranja:')}}
                            {{Form::date('DatumIstekaOsiguranja', null, array('class' => 'form-control', 'placeholder' => ''))}}

                        </div>

                        
                        <div class="form-group">
                            {{Form::label('Temeljna premija:')}}
                            {{Form::number('TemeljnaPremija', null, array('class' => 'form-control', 'placeholder' => 'premija'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Režijski dodatak:')}}
                            {{Form::select('RezijskiDodatakOznaka', DB::table('rezijskidodatak')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'rezijski dodatak'))}}
                        </div>

                        <div class= "form-group">
                            {{Form::label('Bonus:')}}
                            <select id="BonusOznaka" class="form-control" name="BonusOznaka"><option value="0">Stupanj 0.: 0%</option><option value="5">Stupanj 1.: 5%</option><option value="10">Stupanj 2.: 10%</option><option value="15">Stupanj 3.: 15%</option><option value="20">Stupanj 4.: 20%</option><option value="25">Stupanj 5.: 25%</option><option value="30">Stupanj 6.: 30%</option><option value="35">Stupanj 7.: 35%</option><option value="40">Stupanj 8.: 40%</option><option value="45">Stupanj 9.: 45%</option><option value="50">Stupanj 10.: 50%</option><option value="54">Stupanj 11.: 54%</option><option value="58">Stupanj 12.: 58%</option><option value="60">Stupanj 13.: 60%</option><option value="62">Stupanj 14.: 62%</option><option value="64">Stupanj 15.: 64%</option><option value="66">Stupanj 16.: 66%</option><option value="68">Stupanj 17.: 68%</option><option value="70">Stupanj 18.: 70%</option><option value="72">Stupanj 19.: 72%</option><option value="74">Stupanj 20.: 74%</option></select>

                        </div>

                        <div class= "form-group">
                            {{Form::label('Malus:')}}
                            <select id="MalusOznaka" class="form-control" name="MalusOznaka"><option value="-40">Stupanj M, M2: -40%</option><option value="-20">Stupanj S, M1: -20%</option>
                            </select>

                        </div>

                        <div class="form-group">
                            {{Form::label('Poseban popust:')}}
                            {{Form::select('PosebniPopustOznaka', DB::table('posebanpopust')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'poseban popust'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Zona:')}}
                            <select name="ZonaOznaka" onchange="zonaJS(this.value)"><option value="AN">Auto nezgoda</option><option value="ANE">Auto nezgoda exclusive</option><option value="ZONA">Zona</option><option value="ZONAE">Zona exclusive</option></select>
                        </div>

                        <div class="form-group">
                            {{Form::label('Zona svota:')}}
                            

                            <select id="ZonaSvotaOznaka" name="ZonaSvotaOznaka">
                            <option value="SOA">Osigurana svota u slučaju smrti 40000 Kn</option><option value="SOA3">Osigurana svota u slučaju smrti 50000 Kn</option><option value="SOA4">Osigurana svota u slučaju smrti 60000 Kn</option><option value="SOA5">Osigurana svota u slučaju smrti 80000 Kn</option><option value="SOA6">Osigurana svota u slučaju smrti 100000 Kn</option><option value="SOA7">Osigurana svota u slučaju smrti 120000 Kn</option><option value="SOA8">Osigurana svota u slučaju smrti 150000 Kn</option><option value="SOA9">Osigurana svota u slučaju smrti 200000 Kn</option>
                            </select>
                           
                        </div>

                         <div class="form-group">
                            {{Form::label('Zona vrsta vozača:')}}
                            

                            <select id="ZonaVrstaVozacaOznaka" name="ZonaVrstaVozacaOznaka"><option value="L1">Vozač profesionalac</option><option value="L2">Vozač amater</option><option value="L3">Vozač mopeda</option><option value="L4">Vozač traktora</option></select>
                           
                        </div>

                        <div class="form-group">
                            {{Form::label('Zona vrsta putnika:')}}
                            

                            <select id="ZonaVrstaPutnikaOznaka" name="ZonaVrstaPutnikaOznaka"><option value="L5">Putnik taxi, rent a car</option><option value="L6">Putnik automobil,autobus</option><option value="L7">Radnici (utovar/istovar)</option></select>
                           
                        </div>

                        <div class="form-group">
                            {{Form::label('Broj Zelenog Kartona:')}}
                            {{Form::number('BrojZelenogKartona', null, array('class' => 'form-control', 'placeholder' => 'broj zelenog kartona'))}}

                        </div>



                       
                         <div class="form-group">
                            {{Form::label('Proba:')}}
                            {{Form::number('Proba', null, array('class' => 'form-control', 'placeholder' => 'Probne tablice'))}}

                        </div>
                    </div>
                    <button type="submit">Dalje</button>
                            {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
        