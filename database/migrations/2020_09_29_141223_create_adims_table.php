<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adims', function (Blueprint $table) {
            $table->id();
            $table->string('Nome_admin');
            $table->string('login');
            $table->stting('senha');
            // $table->foreign('cd_cliente')->references('id')->on('Clientes');
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
        Schema::dropIfExists('adims');
    }
}
