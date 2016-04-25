<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvenantRmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avenant_rm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mission_id');
            $table->string('reference')->unique();

            $table->date('date');
            $table->mediumText('motif');
            $table->date('date_echeance');
            
            $table->double('montant_ht');
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
        Schema::drop('avenant_rm');
    }
}
