<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();
            
            $table->integer('entreprise_id');
            $table->integer('user_id');
            
            $table->integer('avant_projet_id');
            $table->integer('convention_client_id');
            
            $table->integer('avenant_cc_id');
            $table->integer('avenant_rm_id');

            $table->integer('avenant_rupture_cc_id');
            $table->integer('avenant_rupture_rm_id');
            
            $table->double('montant_ht');
            $table->double('montant_etudiant_ht');

            $table->string('sujet');
            $table->mediumText('description');

            $table->date('debut');
            $table->date('fin');

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
        Schema::drop('mission');
    }
}
