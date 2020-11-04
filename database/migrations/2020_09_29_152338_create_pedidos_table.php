<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pedidos', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('cd_cliente');
      $table->unsignedBigInteger('cd_pagamento');
      $table->unsignedBigInteger('cd_tipo_pagamento');
      $table->unsignedBigInteger('cd_status_pedido');
      $table->unsignedBigInteger('cd_endereco_entrega');
      
      $table->foreign('cd_tipo_pagamento')
        ->references('id')->on('pagamentos');

      $table->foreign('cd_cliente')
        ->references('id')->on('clientes');

      $table->foreign('cd_status_pedido')
        ->references('id')->on('status_pedidos');

      $table->foreign('cd_endereco_entrega')
        ->references('id')->on('enderecos');

      $table->foreing('cd_pagamento')
        ->references('id')->on('pagamentos');

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
    Schema::dropIfExists('pedidos');
  }
}
