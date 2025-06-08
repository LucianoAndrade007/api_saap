<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros_boletas_facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pago_id')->index('idx_registros_boletas_facturas_pago');
            $table->unsignedInteger('usuario_id')->index('idx_registros_boletas_facturas_usuario');
            $table->integer('tipo_usuario_id');
            $table->date('fecha_cierre');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_boletas_facturas');
    }
};
