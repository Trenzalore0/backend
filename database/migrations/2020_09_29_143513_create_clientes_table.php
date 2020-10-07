<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('rg');
            $table->string('cpf');
            $table->date('data_de_nascimento');
            $table->enum('genero', ['Masculino', 'Feminino', 'Prefiro não informar']);
            $table->string('login');
            $table->string('senha');
            $table->unsignedBigInteger('cd_login');
            $table->foreign('cd_login')->references('id')->on('logins');
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
        Schema::dropIfExists('clientes');
    }
}
