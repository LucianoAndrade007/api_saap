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
        Schema::table('usuarios_cliente_datos', function (Blueprint $table) {
            $table->foreign(['id_ruta'], 'fk_usuarios_ruta')->references(['id'])->on('rutas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_usuarios_usuarios')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios_cliente_datos', function (Blueprint $table) {
            $table->dropForeign('fk_usuarios_ruta');
            $table->dropForeign('fk_usuarios_usuarios');
        });
    }
};
