<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('fecha');
            $table->string('concepto')->nullable();
            $table->decimal('valor', 20, 2)->nullable();
            $table->string('estado')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('descuentos');
    }
}
