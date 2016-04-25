<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convention_client_id');
            $table->string('reference')->unique();
            
            $table->double('solde_intermediaire_ht');
            $table->integer('jeh_intermediaire');

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
         Schema::drop('versement');
    }
}
