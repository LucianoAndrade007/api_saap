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
        Schema::table('ingresos_egresos', function (Blueprint $table) {
            $table->foreign(['plan_cuenta_id'], 'fk_ingresos_egresos_cuenta')->references(['id'])->on('planes_cuentas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['tipo_documento_id'], 'fk_ingresos_egresos_documento')->references(['id'])->on('tipos_documentos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['proveedor_id'], 'fk_ingresos_egresos_proveedor')->references(['id'])->on('proveedores')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['tipo_id'], 'fk_ingresos_egresos_tipo')->references(['id'])->on('tipos_ingresos_egresos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingresos_egresos', function (Blueprint $table) {
            $table->dropForeign('fk_ingresos_egresos_cuenta');
            $table->dropForeign('fk_ingresos_egresos_documento');
            $table->dropForeign('fk_ingresos_egresos_proveedor');
            $table->dropForeign('fk_ingresos_egresos_tipo');
        });
    }
};
