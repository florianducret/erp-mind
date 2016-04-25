<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhaseRuptureAvenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_rupture_avenant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();
            $table->integer('avenant_rupture_cc_id');
            $table->integer('avenant_rupture_rm_id');
            
            $table->integer('numero');
            $table->string('nom');
            $table->integer('jeh_phase');

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
        Schema::drop('phase_rupture_avenant');
    }
}
