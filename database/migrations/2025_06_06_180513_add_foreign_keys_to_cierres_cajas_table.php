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
        Schema::table('cierres_cajas', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_cierres_cajas_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['apertura_id'], 'fk_cierres_cajas_apertura')->references(['id'])->on('aperturas_cajas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cierres_cajas', function (Blueprint $table) {
            $table->dropForeign('fk_cierres_cajas_admin');
            $table->dropForeign('fk_cierres_cajas_apertura');
        });
    }
};
