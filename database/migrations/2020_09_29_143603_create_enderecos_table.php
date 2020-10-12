<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('enderecos', function (Blueprint $table) {
      $table->id();
      $table->string('rua');
      $table->integer('numero');
      $table->string('bairro');
      $table->string('cep');
      $table->unsignedBigInteger('cd_uf');
      $table->foreign('cd_uf')->references('id')->on('ufs');
      $table->string('referencia');
      $table->string('complemento');
      $table->unsignedBigInteger('cd_cliente');
      $table->foreign('cd_cliente')->references('id')->on('clientes');
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
    Schema::dropIfExists('enderecos');
  }
}
