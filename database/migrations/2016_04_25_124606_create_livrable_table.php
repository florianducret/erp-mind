<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();
            $table->integer('avenant_rupture_cc_id');
            $table->mediumText('livrables');
            
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
        Schema::drop('livrable');
    }
}
