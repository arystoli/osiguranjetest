<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPolicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policas', function (Blueprint $table) {
            $table->integer('interniDobavljac');
            $table->string('eksterniDobavljac');
            $table->integer('nadzornikTehnicki');

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
            

        });
    }
}
