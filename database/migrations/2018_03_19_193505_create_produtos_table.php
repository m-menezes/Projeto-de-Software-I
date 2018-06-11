<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('produto');
            $table->string('tipo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('status');
            $table->datetime('datareserva')->nullable();
            $table->integer('idpessoa')->unsigned()->references('id')->on('pessoa');
            $table->integer('idorganizacao')->unsigned()->nullable()->references('id')->on('organizacao');
            $table->integer('idchat')->unsigned()->nullable()->references('id')->on('chat');
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
        Schema::dropIfExists('produtos');
    }
}
