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
        Schema::table('receptores', function (Blueprint $table) {
            $table->foreign(['comuna_id'], 'fk_receptores_comuna')->references(['id'])->on('comunas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_receptores_usuario')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receptores', function (Blueprint $table) {
            $table->dropForeign('fk_receptores_comuna');
            $table->dropForeign('fk_receptores_usuario');
        });
    }
};
