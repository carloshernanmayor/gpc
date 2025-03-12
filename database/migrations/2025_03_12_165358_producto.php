<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function(Blueprint $table){
            $table->bigIncrements('id_producto');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('material');
            $table->string('sector');
            $table->string('dimensiones');
            $table->dateTime('fecha_creacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schemma::dropIfExits('producto');
    }
}
