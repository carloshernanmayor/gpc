<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Atencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('atencion', function (Blueprint $table) {
            $table->bigIncrements('id_atencion');
            $table->unsignedBigInteger('id_cliente'); 
            $table->unsignedBigInteger('id_vendedor'); 
            $table->unsignedBigInteger('id_guion')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->dateTime('fecha')->useCurrent();
            $table->enum('resultado', ['pendiente', 'exitoso', 'no interesado'])->default('pendiente');            
            $table->text('observaciones')->nullable();

            
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente')->onDelete('cascade');
            $table->foreign('id_vendedor')->references('id_vendedor')->on('vendedor')->onDelete('cascade');
            $table->foreign('id_guion')->references('id_guion')->on('guion_ventas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencion');
    }
}
