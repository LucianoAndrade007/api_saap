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
        Schema::table('proveedores', function (Blueprint $table) {
            $table->foreign(['banco_id'], 'fk_proveedores_banco')->references(['id'])->on('bancos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['comuna_id'], 'fk_proveedores_comuna')->references(['id'])->on('comunas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['region_id'], 'fk_proveedores_region')->references(['id'])->on('regiones')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['tipo_cuenta_id'], 'fk_proveedores_tipo_cuenta')->references(['id'])->on('tipos_cuentas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropForeign('fk_proveedores_banco');
            $table->dropForeign('fk_proveedores_comuna');
            $table->dropForeign('fk_proveedores_region');
            $table->dropForeign('fk_proveedores_tipo_cuenta');
        });
    }
};
