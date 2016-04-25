<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            
            $table->string('name');
            $table->string('firstname');
            
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email')->unique();
            
            $table->date('date_naissance');
            $table->string('ville_naissance');
            $table->string('nationalite');
            
            $table->string('num_secu');
            $table->string('statut');
            $table->boolean('pes');
            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
