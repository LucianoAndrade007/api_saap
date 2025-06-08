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
        Schema::table('acceso_modulo', function (Blueprint $table) {
            $table->foreign(['modulo_id'], 'fk_acceso_modulo_modulo')->references(['id'])->on('modulos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['roles_id'], 'fk_acceso_modulo_roles')->references(['id'])->on('roles')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acceso_modulo', function (Blueprint $table) {
            $table->dropForeign('fk_acceso_modulo_modulo');
            $table->dropForeign('fk_acceso_modulo_roles');
        });
    }
};
