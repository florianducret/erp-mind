<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConventionClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convention_client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entreprise_id');

            $table->string('reference')->unique();
            $table->date('realisation');
            $table->double('montant_sans_frais_ht');
            $table->double('montant_avec_frais_ht');
            $table->double('pourcentage_accompte');
            $table->integer('jeh');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('convention_client');
    }
}
