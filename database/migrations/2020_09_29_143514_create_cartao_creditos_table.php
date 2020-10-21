<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao_creditos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_titular');
            $table->string('cpf_titular');
            $table->string('numero_cartao');
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
        Schema::dropIfExists('cartao_creditos');
    }
}
