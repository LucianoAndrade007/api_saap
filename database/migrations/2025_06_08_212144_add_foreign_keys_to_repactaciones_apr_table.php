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
        Schema::table('repactaciones_apr', function (Blueprint $table) {
            $table->foreign(['usuario_id'], 'fk_repactaciones_apr_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repactaciones_apr', function (Blueprint $table) {
            $table->dropForeign('fk_repactaciones_apr_usuario');
        });
    }
};
