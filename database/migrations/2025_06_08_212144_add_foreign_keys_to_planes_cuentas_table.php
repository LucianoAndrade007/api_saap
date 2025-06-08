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
        Schema::table('planes_cuentas', function (Blueprint $table) {
            $table->foreign(['padre_id'], 'fk_planes_cuentas_padre')->references(['id'])->on('planes_cuentas')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planes_cuentas', function (Blueprint $table) {
            $table->dropForeign('fk_planes_cuentas_padre');
        });
    }
};
