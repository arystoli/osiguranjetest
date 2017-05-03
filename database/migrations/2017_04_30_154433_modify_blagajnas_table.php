<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBlagajnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blagajnas', function (Blueprint $table) {
            //
            $table->dropColumn('nacinPlacanja');
            $table->dropColumn('iznosUplacen');
            $table->integer('iznos');
            $table->string('osiguranje');
            $table->string('operater');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blagajnas', function (Blueprint $table) {
            //
        });
    }
}
