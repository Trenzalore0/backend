<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('ds_produto');
            $table->string('nome_produto');
            $table->string('ano_produto');
            $table->float('valor_produto');
            $table->float('desconto_produto');
            $table->unsignedBigInteger('cd_pais_origem');
            $table->unsignedBigInteger('cd_categoria');
            $table->img('imagem');
            // $table->unsignedBigInteger('cd_imagem');
            $table->foreign('cd_pais_origem')->references('id')->on('pais_origem');
            $table->foreign('cd_categoria')->references('id')->on('categorias');
            // $table->foreign('cd_imagem')->references('id')->on('imagens');
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
