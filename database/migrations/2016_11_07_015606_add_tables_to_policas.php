<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablesToPolicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policas', function (Blueprint $table) {

            //Osiguranik
            $table->string('osiguranikNaziv');
            $table->string('osiguranikIme');
            $table->string('osiguranikPrezime');
            $table->string('osiguranikOib');
            $table->dateTimeTz('osiguranikDatumRodjenja');
            $table->string('osiguranikSpolOznaka');
            $table->string('osiguranikUlica');
            $table->string('osiguranikKucniBroj');
            $table->string('osiguranikPostanskiBroj');
            $table->string('osiguranikNaselje');
            $table->string('osiguranikNaseljeOznaka');
            $table->string('osiguranikTelefon');
            $table->string('osiguranikEmail');

            //Ugovaratelj
            $table->string('ugovarateljNaziv');
            $table->string('ugovarateljIme');
            $table->string('ugovarateljPrezime');
            $table->string('ugovarateljOib');
            $table->dateTimeTz('ugovarateljDatumRodjenja');
            $table->string('ugovarateljSpolOznaka');
            $table->string('ugovarateljUlica');
            $table->string('ugovarateljKucniBroj');
            $table->string('ugovarateljPostanskiBroj');
            $table->string('ugovarateljNaselje');
            $table->string('ugovarateljNaseljeOznaka');
            $table->string('ugovarateljTelefon');
            $table->string('ugovarateljEmail');

            //Info o polici i vozilu
            $table->string('RanijeOsiguravajuceDrustvoSifra');
            $table->string('BrojRanijePolice');
            $table->string('RegistarskaOznaka');
            $table->string('Marka');
            $table->string('BrojSasije');
            $table->string('GodinaProizvodnje');
            $table->integer('Snaga');
            $table->integer('Zapremina');
            $table->integer('Nosivost');
            $table->integer('NrojPutnika');
            $table->string('Noja');
            $table->boolean('Proba');
            $table->string('TarifnaGrupaOznaka');
            $table->string('TarifnaPodGrupaOznaka');
            $table->string('TarifniPopustOznaka');
            $table->string('TarifniDoplatakOznaka');
            $table->double('OsiguranaSvota');
            $table->dateTimeTz('DatumPocetkaOsiguranja');
            $table->dateTimeTz('DatumIstekaOsiguranja');
            $table->double('TemeljnaPremija');
            $table->double('RezijskiDodatakOznaka');
            $table->string('BonusOznaka');
            $table->string('MalusOznaka');
            $table->boolean('AOPlusOmogoceno');
            $table->boolean('AOPlusOdabrano');
            $table->double('AOPlusPremija');
            $table->boolean('DjelomicniKaskoOmoguceno');
            $table->boolean('DjelomicniKaskoOdobreno');
            $table->double('DjelomicniKaskoPremija');
            $table->double('TarifniDoplatakIznos');
            $table->double('TarifniPopustIznos');
            $table->string('PosebniPopustOznaka');
            $table->boolean('ZonaOmoguceno');
            $table->boolean('ZonaOdabrano');
            $table->string('ZonaOznaka');
            $table->string('ZonaSvotaOznaka');
            $table->string('ZonaVrstaVozacaOznaka');
            $table->string('ZonaVrstaPutnikaOznaka');
            $table->string('AutoNezgodaOznakaPremijskeGrupe');
            $table->double('AutoNezgodaOsiguranaSvotaSmrt');
            $table->double('AutoNezgodaOsiguranaSvotaInvaliditet');
            $table->double('AutoNezgodaOsiguranaSvotaLijecenje');
            $table->double('AutoNezgodaPremija');
            $table->double('PorezTrosarinaPostotak');
            $table->double('PorezTrosarinaIznos');
            $table->double('Premija');
            $table->integer('BrojZelenogKartona');
            $table->double('ZonaIznos');
            $table->double('ZonaOsiguranaSvota');
            $table->dateTimeTz('DatumIzdavanja');
            $table->boolean('PrikupljanjePodataka');
            $table->string('BrojPoliceBonus');
            $table->string('BrojPoliceBonusRazlog');
            $table->dateTimeTz('DatumPocetkaDugorocnogOsiguranja');
            $table->dateTimeTz('DatumIstekaDugorocnogOsiguranja');
            $table->string('OsobaZaObracunOznaka'); 
            $table->string('VozacOznaka'); 
            $table->string('KilometaraGodisnjeOznaka'); ///
            $table->dateTimeTz('DatumIzdavanjeDozvole');
            $table->integer('Kilometraza');
            $table->string('PopustViseVozilaOznaka'); 
            $table->double('PopustViseVozilaPostotak');
            $table->double('PopustViseVozilaIznos');
            $table->string('PopustViseVozilaOsnov');
            $table->string('PopustDugorocnoSifra');
            $table->double('PopustDugorocnoPostotak');
            $table->double('PopustDugorocnoIznos');
            $table->string('PopustKorporativniOznaka');
            $table->double('PopustKorporativniPostotak');
            $table->double('PopustKorporativniIznos');
            $table->string('NacinPlacanjaOznaka');
            $table->double('NacinPlacanjaPostotak');
            $table->double('NacinPlacanjaIznos');
            $table->double('NacinPlacanjaIznos2');
            $table->boolean('ZastitaBonusaOmoguceno');
            $table->boolean('ZastitaBonusaOdabrano');
            $table->double('ZastitaBonusaIznos');
            $table->boolean('ZastitaVozacaOmoguceno');
            $table->boolean('ZastitaVozacaOdabrano');
            $table->double('ZastitaVozacaIznos');
            $table->string('MjestoIzdavanja');
            $table->string('Napomena');
            $table->string('UvjetiOznaka');
            $table->string('Cjenik');
            $table->integer('RanijiBonu');
            $table->integer('PlacanjeIznosGotovinePrvaRata');
            $table->integer('PlacanjeBrojObroka');
            $table->dateTimeTz('PlacanjeDatumDospijecaPrveRate');
            $table->string('SredstvaPlacanjaOznaka');
            $table->string('BankaKarticarOznaka');
            $table->string('BrojRacuna');
            $table->string('SerijskiBroj');
            $table->string('Naputak');
            $table->string('TehnickaKarakteristika');


 


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
