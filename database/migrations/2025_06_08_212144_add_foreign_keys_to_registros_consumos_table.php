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
        Schema::table('registros_consumos', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_registros_consumos_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['medidor_id'], 'fk_registros_consumos_medidor')->references(['id'])->on('medidores')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_registros_consumos_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros_consumos', function (Blueprint $table) {
            $table->dropForeign('fk_registros_consumos_admin');
            $table->dropForeign('fk_registros_consumos_medidor');
            $table->dropForeign('fk_registros_consumos_usuario');
        });
    }
};
