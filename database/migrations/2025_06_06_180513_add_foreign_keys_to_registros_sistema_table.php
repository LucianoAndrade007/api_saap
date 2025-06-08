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
        Schema::table('registros_sistema', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_registros_sistema_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['tipo_registro_id'], 'fk_registros_sistema_tipo')->references(['id'])->on('tipos_registros')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_registros_sistema_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros_sistema', function (Blueprint $table) {
            $table->dropForeign('fk_registros_sistema_admin');
            $table->dropForeign('fk_registros_sistema_tipo');
            $table->dropForeign('fk_registros_sistema_usuario');
        });
    }
};
