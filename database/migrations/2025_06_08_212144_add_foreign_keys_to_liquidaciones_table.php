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
        Schema::table('liquidaciones', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_liquidaciones_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['afp_id'], 'fk_liquidaciones_afp')->references(['id'])->on('afp')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['caja_compensacion_id'], 'fk_liquidaciones_caja_compensacion')->references(['id'])->on('cajas_compensacion')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['estado_id'], 'fk_liquidaciones_estado')->references(['id'])->on('estados_liquidacion')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('liquidaciones', function (Blueprint $table) {
            $table->dropForeign('fk_liquidaciones_admin');
            $table->dropForeign('fk_liquidaciones_afp');
            $table->dropForeign('fk_liquidaciones_caja_compensacion');
            $table->dropForeign('fk_liquidaciones_estado');
        });
    }
};
