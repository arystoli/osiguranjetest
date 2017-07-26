

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
                            
                        </div>
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
                            {{Form::label('Snaga (kW):')}}
                            {{Form::number('Snaga', null, array('class' => 'form-control', 'placeholder' => 'snaga vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Zapremina (ccm):')}}
                            {{Form::number('Zapremina', null, array('class' => 'form-control', 'placeholder' => 'zapremina vozila'))}}

                        </div>

                         <div class="form-group">
                            {{Form::label('Nosivost (kg):')}}
                            {{Form::number('Nosivost', null, array('class' => 'form-control', 'placeholder' => 'nosivost vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Broj putnika:')}}
                            {{Form::number('BrojPutnika', null, array('class' => 'form-control', 'placeholder' => 'broj putnika'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Boja:')}}
                            {{Form::text('Boja', null, array('class' => 'form-control', 'placeholder' => 'boja vozila'))}}

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
                            <select id="TarifniPopustOznaka" class="form-control" name="TarifniPopustOznaka"><option value="">Nema</option><option value="P1">za tjelesno oštećenje 15%</option><option value="P2">za tjelesno oštećenje 20%</option><option value="P5">za starodobna vozila 50%</option>
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
                            {{Form::label('Režijski dodatak:')}}
                            {{Form::select('RezijskiDodatakOznaka', DB::table('rezijskidodatak')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'rezijski dodatak'))}}
                        </div>

                        <div class= "form-group">
                            {{Form::label('Bonus:')}}
                            <select id="BonusOznaka" class="form-control" name="BonusOznaka"><option value="0">Stupanj 0.: 0%</option><option value="5">Stupanj 1.: 5%</option><option value="10">Stupanj 2.: 10%</option><option value="15">Stupanj 3.: 15%</option><option value="20">Stupanj 4.: 20%</option><option value="25">Stupanj 5.: 25%</option><option value="30">Stupanj 6.: 30%</option><option value="35">Stupanj 7.: 35%</option><option value="40">Stupanj 8.: 40%</option><option value="45">Stupanj 9.: 45%</option><option value="50">Stupanj 10.: 50%</option><option value="54">Stupanj 11.: 54%</option><option value="58">Stupanj 12.: 58%</option><option value="60">Stupanj 13.: 60%</option><option value="62">Stupanj 14.: 62%</option><option value="64">Stupanj 15.: 64%</option><option value="66">Stupanj 16.: 66%</option><option value="68">Stupanj 17.: 68%</option><option value="70">Stupanj 18.: 70%</option><option value="72">Stupanj 19.: 72%</option><option value="74">Stupanj 20.: 74%</option></select>

                        </div>

                        <div class="form-group">

                            {{Form::label('Zaštita Bonusa:')}}
                            {{Form::label('Da')}}
                            {{Form::radio('ZastitaBonusaOdabrano', true)}}
                            {{Form::label('Ne')}}
                            {{Form::radio('ZastitaBonusaOdabrano', false)}}
                        </div>

                        <div class= "form-group">
                            {{Form::label('Malus:')}}
                            <select id="MalusOznaka" class="form-control" name="MalusOznaka"><option value="">Nema</option><option value="-40">Stupanj M, M2: -40%</option><option value="-20">Stupanj S, M1: -20%</option>
                            </select>

                        </div>

                        <div class="form-group">
                            {{Form::label('Poseban popust:')}}
                            {{Form::select('PosebniPopustOznaka', DB::table('posebanpopust')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'poseban popust'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Zona:')}}
                            <select name="ZonaOznaka" onchange="zonaJS(this.value)"><option value="">Nema</option><option value="AN">Auto nezgoda</option><option value="ANE">Auto nezgoda exclusive</option><option value="ZONA">Zona</option><option value="ZONAE">Zona exclusive</option></select>
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
                            {{Form::label('Početak dugoročnog osiguranja:')}}
                            {{Form::date('DatumPocetkaDugorocnogOsiguranja', null, array('class' => 'form-control', 'placeholder' => ''))}}

                        </div>
                        <div class="form-group">
                            {{Form::label('Istek dugoročnog osiguranja:')}}
                            {{Form::date('DatumIstekaDugorocnogOsiguranja', null, array('class' => 'form-control', 'placeholder' => ''))}}

                        </div>

                         <div class="form-group">
                            {{Form::label('Osoba za obracun oznaka:')}}
                            {{Form::text('OsobaZaObracunOznaka', null, array('class' => 'form-control', 'placeholder' => 'Osoba'))}}
                        </div>
                        
                                                
                        <div class="form-group">
                            {{Form::label('Vozač:')}}
                            {{Form::select('VozacOznaka', DB::table('vozac')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'rezijski dodatak'))}}
                        </div>
                        <!--TODO: Dodati ovisnost o izabranom tipu osobe-->

                        <div class="form-group">
                            {{Form::label('Godišnja kilometraža:')}}
                            {{Form::select('KilometaraGodisnjeOznaka', DB::table('kilometaragodisnje')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'Kilometara godišnje'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Datum izdavanja dozvole:')}}
                            {{Form::date('DatumIzdavanjeDozvole', null, array('class' => 'form-control', 'placeholder' => 'Datum izdavanja dozvole vozača'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Kilometraža vozila:')}}
                            {{Form::number('Kilometraza', null, array('class' => 'form-control', 'placeholder' => 'Trenutna kilometraža vozila'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Popust više vozila:')}}
                            {{Form::select('PopustViseVozilaOznaka', DB::table('popustvisevozila')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'Popust više vozila'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Korporativni popust:')}}
                            {{Form::select('PopustKorporativniOznaka ', DB::table('popustkorporativni')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'Popust korporativni'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Način plačanja:')}}
                            {{Form::select('NacinPlacanjaOznaka ', DB::table('nacinplacanja')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'način plaćanja'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Sredstvo plačanja:')}}
                            {{Form::select('SredstvaPlacanjaOznaka ', DB::table('sredstvoplacanja')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'Sredstvo plaćanja'))}}
                        </div>
                         
                        <div class="form-group">
                            {{Form::label('Banka/kartičar:')}}
                            {{Form::select('BankaKarticarOznaka ', DB::table('bankakarticar')->orderBy('Oznaka')->pluck('Naziv','Oznaka'), array('class' => 'form-control', 'placeholder' => 'Banka plaćanja'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Broj računa:')}}
                            {{Form::text('BrojRacuna', null, array('class' => 'form-control', 'placeholder' => 'Broj računa'))}}
                        </div>
                         
                        
                        

                        



                       
                         <div class="form-group">
                            {{Form::label('Proba:')}}
                            {{Form::number('Proba', null, array('class' => 'form-control', 'placeholder' => 'Probne tablice'))}}

                        </div>

                        {{ Form::hidden('hidden_source', 'full_one_page') }}

                        <div class="form-group">
                        <button type="submit">Dalje</button>
                                {{Form::close()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

   
    