<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoCretidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao_cretido', function (Blueprint $table) {
            $table->id();
            $table->string('nome_titular');
            $table->string('cpf_titular');
            $table->string('data_vencimento');
            $table->string('cvv_caartao');
            $table->unsignedBigInteger('cd_cliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('cartao_cretido');
    }
}
