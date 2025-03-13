<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id_cliente'); 
            $table->enum('tipo', ['natural', 'juridica'])->default('natural');            
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->string('contacto_nombre')->nullable($value = true);
            $table->string('contacto_correo')->nullable($value = true);
            $table->string('contacto_telefono')->nullable($value = true);
            $table->dateTime('fecha_registro')->useCurrent();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
