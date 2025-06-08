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
        Schema::table('reclamos', function (Blueprint $table) {
            $table->foreign(['tipo_reclamo_id'], 'fk_reclamos_tipo')->references(['id'])->on('tipos_reclamos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_reclamos_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reclamos', function (Blueprint $table) {
            $table->dropForeign('fk_reclamos_tipo');
            $table->dropForeign('fk_reclamos_usuario');
        });
    }
};
