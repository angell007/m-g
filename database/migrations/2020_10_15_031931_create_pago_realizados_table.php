<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_realizados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('propietario_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->date('fecha');
            $table->date('desde');
            $table->date('hasta');
            $table->decimal('otros', 20, 2)->nullable();
            $table->decimal('totalCreditos', 20, 2)->nullable();
            $table->decimal('totalDebitos', 20, 2)->nullable();
            $table->decimal('administracion', 20, 2)->nullable();
            $table->decimal('descuentos', 20, 2)->nullable();
            $table->decimal('canon', 20, 2)->nullable();
            $table->decimal('comision', 20, 2)->nullable();
            $table->decimal('iva', 20, 2)->nullable();
            $table->decimal('concepto', 20, 2)->nullable();
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
        Schema::dropIfExists('pago_realizados');
    }
}

// 1147058428