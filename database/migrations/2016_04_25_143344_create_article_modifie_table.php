<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleModifieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_modifie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avenant_cc_id');
            
            $table->string('reference')->unique();
            $table->integer('numero_article');
            $table->string('titre');
            
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
        Schema::drop('article_modifie');
    }
}
