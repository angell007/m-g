<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoRecibidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_recibidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arrendatario_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->date('fecha');
            $table->date('desde');
            $table->date('hasta');
            $table->decimal('otros', 20, 2)->nullable();
            $table->decimal('administracion', 20, 2)->nullable();
            $table->decimal('canon', 20, 2)->nullable();
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
        Schema::dropIfExists('pago_recibidos');
    }
}
