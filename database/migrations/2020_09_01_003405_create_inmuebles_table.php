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
            $table->string('codigo')->nullable();
            $table->unsignedBigInteger('propietario_id');
            $table->string('departamento');
            $table->string('direccion');
            $table->enum('proposito', ['arrendamiento', 'venta']);
            $table->decimal('canon', 20, 2)->nullable();
            $table->string('portada')->nullable();
            $table->string('habitaciones')->nullable();
            $table->string('barrio')->nullable();
            $table->enum('amoblado', ['si', 'no'])->nullable();          
            $table->decimal('precio', 20, 2)->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['local', 'apartamento', 'casa', 'bodega']);
            $table->string('baños')->nullable();
            $table->string('parqueadero')->nullable();

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
