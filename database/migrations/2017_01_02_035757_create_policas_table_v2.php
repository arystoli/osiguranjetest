<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicasTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policas', function (Blueprint $table) {

            $table->timestamps();
            //Osiguranik

            $table->increments('id');
            //osiguranik
            $table->integer('osiguranikId')->nullable();            
            $table->string('osiguranikNaziv')->nullable();
            $table->string('osiguranikIme')->nullable();
            $table->string('osiguranikPrezime')->nullable();
            $table->string('osiguranikOib')->nullable();
            $table->dateTimeTz('osiguranikDatumRodjenja')->nullable();
            $table->string('osiguranikSpolOznaka')->nullable();
            $table->string('osiguranikUlica')->nullable();
            $table->string('osiguranikKucniBroj')->nullable();
            $table->string('osiguranikPostanskiBroj')->nullable();
            $table->string('osiguranikNaselje')->nullable();
            $table->string('osiguranikNaseljeOznaka')->nullable();
            $table->string('osiguranikTelefon')->nullable();
            $table->string('osiguranikEmail')->nullable();

            //Ugovaratelj
            $table->string('ugovarateljNaziv')->nullable();
            $table->string('ugovarateljIme')->nullable();
            $table->string('ugovarateljPrezime')->nullable();
            $table->string('ugovarateljOib')->nullable();
            $table->dateTimeTz('ugovarateljDatumRodjenja')->nullable();
            $table->string('ugovarateljSpolOznaka')->nullable();
            $table->string('ugovarateljUlica')->nullable();
            $table->string('ugovarateljKucniBroj')->nullable();
            $table->string('ugovarateljPostanskiBroj')->nullable();
            $table->string('ugovarateljNaselje')->nullable();
            $table->string('ugovarateljNaseljeOznaka')->nullable();
            $table->string('ugovarateljTelefon')->nullable();
            $table->string('ugovarateljEmail')->nullable();

            //Info o polici i vozilu
            $table->string('RanijeOsiguravajuceDrustvoSifra')->nullable();
            $table->string('BrojRanijePolice')->nullable();
            $table->string('RegistarskaOznaka')->nullable();
            $table->string('Marka')->nullable();
            $table->string('BrojSasije')->nullable();
            $table->string('GodinaProizvodnje')->nullable();
            $table->integer('Snaga')->nullable();
            $table->integer('Zapremina')->nullable();
            $table->integer('Nosivost')->nullable();
            $table->integer('NrojPutnika')->nullable();
            $table->string('Boja')->nullable();
            $table->boolean('Proba')->nullable();
            $table->string('TarifnaGrupaOznaka')->nullable();
            $table->string('TarifnaPodGrupaOznaka')->nullable();
            $table->string('TarifniPopustOznaka')->nullable();
            $table->string('TarifniDoplatakOznaka')->nullable();
            $table->double('OsiguranaSvota')->nullable();
            $table->dateTimeTz('DatumPocetkaOsiguranja')->nullable();
            $table->dateTimeTz('DatumIstekaOsiguranja')->nullable();
            $table->double('TemeljnaPremija')->nullable();
            $table->double('RezijskiDodatakOznaka')->nullable();
            $table->string('BonusOznaka')->nullable();
            $table->string('MalusOznaka')->nullable();
            $table->boolean('AOPlusOmogoceno')->nullable();
            $table->boolean('AOPlusOdabrano')->nullable();
            $table->double('AOPlusPremija')->nullable();
            $table->boolean('DjelomicniKaskoOmoguceno')->nullable();
            $table->boolean('DjelomicniKaskoOdobreno')->nullable();
            $table->double('DjelomicniKaskoPremija')->nullable();
            $table->double('TarifniDoplatakIznos')->nullable();
            $table->double('TarifniPopustIznos')->nullable();
            $table->string('PosebniPopustOznaka')->nullable();
            $table->boolean('ZonaOmoguceno')->nullable();
            $table->boolean('ZonaOdabrano')->nullable();
            $table->string('ZonaOznaka')->nullable();
            $table->string('ZonaSvotaOznaka')->nullable();
            $table->string('ZonaVrstaVozacaOznaka')->nullable();
            $table->string('ZonaVrstaPutnikaOznaka')->nullable();
            $table->string('AutoNezgodaOznakaPremijskeGrupe')->nullable();
            $table->double('AutoNezgodaOsiguranaSvotaSmrt')->nullable();
            $table->double('AutoNezgodaOsiguranaSvotaInvaliditet')->nullable();
            $table->double('AutoNezgodaOsiguranaSvotaLijecenje')->nullable();
            $table->double('AutoNezgodaPremija')->nullable();
            $table->double('PorezTrosarinaPostotak')->nullable();
            $table->double('PorezTrosarinaIznos')->nullable();
            $table->double('Premija')->nullable();
            $table->integer('BrojZelenogKartona')->nullable();
            $table->double('ZonaIznos')->nullable();
            $table->double('ZonaOsiguranaSvota')->nullable();
            $table->dateTimeTz('DatumIzdavanja')->nullable();
            $table->boolean('PrikupljanjePodataka')->nullable();
            $table->string('BrojPoliceBonus')->nullable();
            $table->string('BrojPoliceBonusRazlog')->nullable();
            $table->dateTimeTz('DatumPocetkaDugorocnogOsiguranja')->nullable();
            $table->dateTimeTz('DatumIstekaDugorocnogOsiguranja')->nullable();
            $table->string('OsobaZaObracunOznaka')->nullable(); 
            $table->string('VozacOznaka')->nullable(); 
            $table->string('KilometaraGodisnjeOznaka')->nullable(); ///
            $table->dateTimeTz('DatumIzdavanjeDozvole')->nullable();
            $table->integer('Kilometraza')->nullable();
            $table->string('PopustViseVozilaOznaka')->nullable(); 
            $table->double('PopustViseVozilaPostotak')->nullable();
            $table->double('PopustViseVozilaIznos')->nullable();
            $table->string('PopustViseVozilaOsnov')->nullable();
            $table->string('PopustDugorocnoSifra')->nullable();
            $table->double('PopustDugorocnoPostotak')->nullable();
            $table->double('PopustDugorocnoIznos')->nullable();
            $table->string('PopustKorporativniOznaka')->nullable();
            $table->double('PopustKorporativniPostotak')->nullable();
            $table->double('PopustKorporativniIznos')->nullable();
            $table->string('NacinPlacanjaOznaka')->nullable();
            $table->double('NacinPlacanjaPostotak')->nullable();
            $table->double('NacinPlacanjaIznos')->nullable();
            $table->double('NacinPlacanjaIznos2')->nullable();
            $table->boolean('ZastitaBonusaOmoguceno')->nullable();
            $table->boolean('ZastitaBonusaOdabrano')->nullable();
            $table->double('ZastitaBonusaIznos')->nullable();
            $table->boolean('ZastitaVozacaOmoguceno')->nullable();
            $table->boolean('ZastitaVozacaOdabrano')->nullable();
            $table->double('ZastitaVozacaIznos')->nullable();
            $table->string('MjestoIzdavanja')->nullable();
            $table->string('Napomena')->nullable();
            $table->string('UvjetiOznaka')->nullable();
            $table->string('Cjenik')->nullable();
            $table->integer('RanijiBonu')->nullable();
            $table->integer('PlacanjeIznosGotovinePrvaRata')->nullable();
            $table->integer('PlacanjeBrojObroka')->nullable();
            $table->dateTimeTz('PlacanjeDatumDospijecaPrveRate')->nullable();
            $table->string('SredstvaPlacanjaOznaka')->nullable();
            $table->string('BankaKarticarOznaka')->nullable();
            $table->string('BrojRacuna')->nullable();
            $table->string('SerijskiBroj')->nullable();
            $table->string('Naputak')->nullable();
            $table->string('TehnickaKarakteristika')->nullable();


 


            //TODO: Nastaviti iz priloženog PDF-a dodati ostatak polja
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('policas', function (Blueprint $table) {
            //
        });
    }
}
