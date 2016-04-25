<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvenantRuptureRmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avenant_rupture_rm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mission_id');
            $table->string('reference')->unique();
            
            $table->mediumText('motif');
            $table->double('montant_accorde_ht');
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
        Schema::drop('avenant_rupture_rm');
    }
}
