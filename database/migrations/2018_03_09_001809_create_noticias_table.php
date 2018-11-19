<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlite2')->create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem_name')->nullable();
            $table->string('imagem_path')->nullable();
            $table->integer('idpessoa')->unsigned()->references('id')->on('pessoa');
            $table->timestamps();
        });

        Schema::connection('sqlite')->create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem_name')->nullable();
            $table->string('imagem_path')->nullable();
            $table->integer('idpessoa')->unsigned()->references('id')->on('pessoa');
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
        Schema::connection('sqlite2')->dropIfExists('noticias');
        Schema::connection('sqlite')->dropIfExists('noticias');
    }
}
