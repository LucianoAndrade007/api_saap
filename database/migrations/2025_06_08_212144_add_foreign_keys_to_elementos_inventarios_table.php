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
        Schema::table('elementos_inventarios', function (Blueprint $table) {
            $table->foreign(['administrador_id'], 'fk_elementos_inventarios_admin')->references(['usuario_id'])->on('usuarios_admin_datos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['area_id'], 'fk_elementos_inventarios_area')->references(['id'])->on('areas_inventario')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elementos_inventarios', function (Blueprint $table) {
            $table->dropForeign('fk_elementos_inventarios_admin');
            $table->dropForeign('fk_elementos_inventarios_area');
        });
    }
};
