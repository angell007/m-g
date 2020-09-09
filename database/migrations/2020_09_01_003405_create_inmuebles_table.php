<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad');
            $table->unsignedBigInteger('propietario_id');
            $table->string('departamento');
            $table->string('direccion');
            $table->enum('proposito', ['arrendamiento', 'venta']);
            $table->string('canon')->nullable();
            $table->string('portada')->nullable();
            $table->string('habitaciones')->nullable();
            $table->enum('tipo', ['apartaestudio', 'apartamento', 'casa', 'bodega']);
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
        Schema::dropIfExists('inmuebles');
    }
}
