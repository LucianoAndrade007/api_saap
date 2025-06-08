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
        Schema::table('usuarios_admin_datos', function (Blueprint $table) {
            $table->foreign(['usuario_id'], 'usuarios_admin_datos_ibfk_1')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios_admin_datos', function (Blueprint $table) {
            $table->dropForeign('usuarios_admin_datos_ibfk_1');
        });
    }
};
