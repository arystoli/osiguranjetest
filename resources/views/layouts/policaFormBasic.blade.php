

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
                            {{Form::label('Nosivost (kg)):')}}
                            {{Form::number('Nosivost', null, array('class' => 'form-control', 'placeholder' => 'nosivost vozila'))}}

                        </div>
                        

                        <div class="form-group">
                            {{Form::label('Boja:')}}
                            {{Form::text('Boja', null, array('class' => 'form-control', 'placeholder' => 'boja vozila'))}}

                        </div>
						
						<div class="form-group">
                            {{Form::label('Broj putnika:')}}
                            {{Form::number('BrojPutnika', null, array('class' => 'form-control', 'placeholder' => 'broj putnika'))}}

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
                            <select id="TarifniPopustOznaka" class="form-control" name="TarifniPopustOznaka"><option value="0">Nema</option><option value="P1">za tjelesno oštećenje 15%</option><option value="P2">za tjelesno oštećenje 20%</option><option value="P5">za starodobna vozila 50%</option>
                            </select>

                        </div>                    

                        <div class= "form-group">
                            {{Form::label('Bonus:')}}
                            <select id="BonusOznaka" class="form-control" name="BonusOznaka"><option value="0">Stupanj 0.: 0%</option><option value="5">Stupanj 1.: 5%</option><option value="10">Stupanj 2.: 10%</option><option value="15">Stupanj 3.: 15%</option><option value="20">Stupanj 4.: 20%</option><option value="25">Stupanj 5.: 25%</option><option value="30">Stupanj 6.: 30%</option><option value="35">Stupanj 7.: 35%</option><option value="40">Stupanj 8.: 40%</option><option value="45">Stupanj 9.: 45%</option><option value="50">Stupanj 10.: 50%</option><option value="54">Stupanj 11.: 54%</option><option value="58">Stupanj 12.: 58%</option><option value="60">Stupanj 13.: 60%</option><option value="62">Stupanj 14.: 62%</option><option value="64">Stupanj 15.: 64%</option><option value="66">Stupanj 16.: 66%</option><option value="68">Stupanj 17.: 68%</option><option value="70">Stupanj 18.: 70%</option><option value="72">Stupanj 19.: 72%</option><option value="74">Stupanj 20.: 74%</option></select>

                        </div>

                        <div class="form-group">
                            {{Form::label('Početak osiguranja:')}}
                            {{Form::date('DatumPocetkaOsiguranja', null, array('class' => 'form-control', 'placeholder' => ''))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Interni dobavljač:')}}                            
                            {{Form::select('interniDobavljac', DB::table('internidobavljac')->orderBy('naziv')->pluck('naziv', 'id'), array('class' => 'form-control', 'placeholder' => 'Interni Dobavljač'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Eksterni dobavljač:')}}
                            {{Form::text('eksterniDobavljac', null, array('class' => 'form-control', 'placeholder' => 'Eksterni dobavljač'))}}

                        </div>

                        <div class="form-group">
                            {{Form::label('Nadzornik Tehničkog pregleda:')}}                            
                            {{Form::select('nadzornikTehnicki', DB::table('nadzorniktehnicki')->orderBy('ImePrezime')->pluck('ImePrezime', 'id'), array('class' => 'form-control', 'placeholder' => 'Nadzornik'))}}

                            

                        </div>


                        {{ Form::hidden('hidden_source', 'basic') }}

                        </div>
                        <div class="form-group">
                        
                        <center><button type="submit">Dalje</button></center></center>
                                {{Form::close()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

   
    