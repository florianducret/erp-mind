<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignataireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signataire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entreprise_id');         
            $table->string('nom');
            $table->string('prenom');
            $table->string('status');
            $table->string('mail');
            $table->string('telephone');
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
        Schema::drop('signataire');
    }
}
