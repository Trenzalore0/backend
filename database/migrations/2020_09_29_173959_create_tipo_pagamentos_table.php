<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cd_cartao_credito')->nullable();
            $table->unsignedBigInteger('cd_boleto')->nullable();
            $table->foreign('cd_cartao_credito')
                ->references('id')->on('cartao_credito');
            $table->foreign('cd_boleto')
                ->references('id')->on('boletos');
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
        Schema::dropIfExists('tipo_pagamentos');
    }
}
