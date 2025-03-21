<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor', function (Blueprint $table) {
            $table->bigIncrements('id_vendedor');
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->dateTime('fecha_ingreso');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::dropIfExists('vendedor');
    }
}
