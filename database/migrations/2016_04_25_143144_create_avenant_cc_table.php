<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvenantCcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avenant_cc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convention_client_id');
            $table->string('reference')->unique();
            
            $table->date('date');
            $table->mediumText('motif');

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
        Schema::drop('avenant_cc');
    }
}
