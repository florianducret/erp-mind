<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvenantRuptureCcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avenant_rupture_cc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convention_client_id');
            $table->string('reference')->unique();

            $table->date('date');
            $table->mediumText('motif');
            $table->double('montant_sans_frais_ht');
            $table->double('montant_frais_ht');

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
        Schema::drop('avenant_rupture_cc');
    }
}
