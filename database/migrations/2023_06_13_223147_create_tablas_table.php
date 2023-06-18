<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 400);
            $table->text('descripcion');
            $table->string('genero', 30);
            $table->integer('valoracion');
            $table->string('imagen', 400);
            $table->string('video', 400);
            $table->timestamps();
        });


        Schema::create('visualizaciones', function (Blueprint $table) {
            $table->increments('id_visualizaciones');
            $table->date('fecha_visualizacion')->nullable();
            $table->integer('id_pelicula')->unsigned()->nullable();
            $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_pelicula')->references('id')->on('peliculas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visualizaciones');
        Schema::dropIfExists('peliculas');
    }
};
