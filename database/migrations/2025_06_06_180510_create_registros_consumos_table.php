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
        Schema::create('registros_consumos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medidor_id')->index('idx_registros_consumos_medidor');
            $table->unsignedInteger('usuario_id')->index('idx_registros_consumos_usuario');
            $table->integer('consumo');
            $table->integer('costo_reposicion_servicio')->default(0);
            $table->integer('multa_intervencion_servicio')->default(0);
            $table->dateTime('fecha_lectura')->index('idx_registros_consumos_fecha');
            $table->string('foto')->nullable();
            $table->string('comentarios', 300)->nullable();
            $table->boolean('lectura_enviada')->default(false);
            $table->unsignedInteger('administrador_id')->index('idx_registros_consumos_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_consumos');
    }
};
