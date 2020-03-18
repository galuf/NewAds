<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {

            date_default_timezone_set('America/Lima');
 
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('distrito_id')->unsigned();
            $table->integer('estado')->unsigned();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('titulo');
            $table->string('imagen');
            $table->text('contenido');
            $table->string('fecha_inicio');
            $table->string('fecha_final')->nullable();
            $table->string('fecha_baja')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('distrito_id')->references('id')->on('distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avisos');
    }
}
