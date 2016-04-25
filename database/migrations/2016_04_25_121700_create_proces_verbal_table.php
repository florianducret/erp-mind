<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesVerbalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proces_verbal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();

            $table->integer('entreprise_id');
            $table->integer('signataire_id');
            $table->integer('mission_id');

            $table->dateTime('duree_garantie');
            $table->date('date');

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
        Schema::drop('proces_verbal');
    }
}
