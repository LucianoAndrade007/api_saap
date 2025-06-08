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
        Schema::table('registros_boletas_facturas', function (Blueprint $table) {
            $table->foreign(['pago_id'], 'fk_registros_boletas_facturas_pago')->references(['id'])->on('pagos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_registros_boletas_facturas_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros_boletas_facturas', function (Blueprint $table) {
            $table->dropForeign('fk_registros_boletas_facturas_pago');
            $table->dropForeign('fk_registros_boletas_facturas_usuario');
        });
    }
};
