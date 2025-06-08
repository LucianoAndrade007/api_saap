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
        Schema::table('dispositivos_moviles', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_dispositivos_moviles_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dispositivos_moviles', function (Blueprint $table) {
            $table->dropForeign('fk_dispositivos_moviles_admin');
        });
    }
};
