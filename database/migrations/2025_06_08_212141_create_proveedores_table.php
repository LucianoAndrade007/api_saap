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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('run')->unique('uk_proveedores_run');
            $table->char('run_dv', 1);
            $table->string('razon_social', 200);
            $table->string('actividad_comercial', 200);
            $table->string('direccion');
            $table->unsignedInteger('region_id')->index('idx_proveedores_region');
            $table->unsignedInteger('comuna_id')->index('idx_proveedores_comuna');
            $table->string('ciudad', 100);
            $table->unsignedInteger('banco_id')->index('idx_proveedores_banco');
            $table->unsignedInteger('tipo_cuenta_id')->index('idx_proveedores_tipo_cuenta');
            $table->string('numero_cuenta', 30);
            $table->string('correo', 100);
            $table->string('telefono', 20);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
