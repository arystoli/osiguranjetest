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
            $table->string('ranijeOsiguravajuceDrustvoSifra');
            $table->string('brojRanijePolice');
            $table->string('registarskaOznaka');
            $table->string('Marka');
            $table->string('brojSasije');
            $table->string('godinaProizvodnje');
            $table->integer('snaga');
            $table->integer('zapremina');
            $table->integer('nosivost');
            $table->integer('brojPutnika');
            $table->string('boja');
            $table->boolean('proba');
            $table->string('tarifnaGrupaOznaka');
            $table->string('TarifnaPodGrupaOznaka');
            $table->string('TarifniPopustOznaka');
            $table->string('TarifniDoplatakOznaka');
            $table->integer('OsiguranaSvota');
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
