<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_usuario', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->index('usuario_id');
            $table->integer('aula_id')->unsigned();
            $table->index('aula_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
        });
        Schema::table('aula_usuario', function($table){

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_usuario');
    }
}
