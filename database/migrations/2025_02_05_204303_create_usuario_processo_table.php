<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioProcessoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_processos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processo_id');
            $table->unsignedBigInteger('grupo_usuario_id');
            $table->timestamps();

            $table->foreign('processo_id')->references('id')->on('processos');
            $table->foreign('grupo_usuario_id')->references('id')->on('grupo_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_processos');
    }
}
