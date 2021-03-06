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
      $table->string('ds_produto', 1000);
      $table->string('nome_produto');
      $table->string('ano_produto');
      $table->float('valor_produto');
      $table->float('desconto_produto');
      $table->unsignedBigInteger('cd_pais_origem');
      $table->unsignedBigInteger('cd_categoria');
      $table->string('ds_imagem');
      $table->foreign('cd_pais_origem')
        ->references('id')->on('pais_origem');
      $table->foreign('cd_categoria')
        ->references('id')->on('categorias');
      $table->timestamps();
      $table->delete();
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
