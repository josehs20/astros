<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuporteRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suporte_respostas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('suporte_id');
            $table->text('mensagem');
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('suporte_id')->references('id')->on('suportes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suporte_respostas');
    }
}
