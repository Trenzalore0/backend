<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedido', function (Blueprint $table) {
            $table->foreign('cd_produto')->references('id')->on('produtos');
            $table->foreign('cd_pedido')->references('id')->on('pedidos');
            $table->integer('quantidade_produto');
            $table->float('valor_produto');
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
        Schema::dropIfExists('item_pedido');
    }
}
    