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
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('consumo_id')->index('idx_pagos_consumo');
            $table->unsignedInteger('usuario_id')->index('idx_pagos_usuario');
            $table->integer('tipo_usuario_id');
            $table->integer('tipo_medidor_id');
            $table->dateTime('fecha_lectura_anterior');
            $table->dateTime('fecha_lectura_actual')->index('idx_pagos_fecha_actual');
            $table->integer('medicion_anterior');
            $table->integer('medicion_actual');
            $table->integer('m3_consumidos');
            $table->integer('valor_m3_agua');
            $table->integer('valor_m3_alcantarillado');
            $table->integer('valor_fijo_alcantarillado')->nullable();
            $table->integer('valor_fijo_agua')->nullable();
            $table->integer('valor_mensual_agua')->nullable();
            $table->integer('valor_mensual_alcantarillado')->nullable();
            $table->integer('total_consumo_agua_alcantarillado')->nullable();
            $table->integer('total_fijo_agua_alcantarillado')->nullable();
            $table->integer('total_sin_descuento')->nullable();
            $table->integer('descuento_subsidio')->nullable();
            $table->integer('descuento_convenio_apr')->nullable();
            $table->integer('iva')->nullable();
            $table->integer('multa_intervencion_servicio')->default(0);
            $table->integer('costo_reposicion_servicio')->default(0);
            $table->bigInteger('monto_total');
            $table->tinyInteger('estado_id')->default(0)->index('idx_pagos_estado');
            $table->dateTime('fecha_pago')->nullable()->index('idx_pagos_fecha_pago');
            $table->unsignedInteger('metodo_pago_id')->nullable()->index('idx_pagos_metodo_pago');
            $table->boolean('pago_habilitado')->default(false);
            $table->integer('deuda_pendiente')->default(0);
            $table->integer('monto_convenio')->default(0);
            $table->integer('numero_cuota')->default(0);
            $table->integer('numero_ingreso')->default(0);
            $table->boolean('estado_moroso')->default(false);
            $table->string('origen', 50)->default('sistema');
            $table->decimal('porcentaje_sobreconsumo', 10)->default(0);
            $table->integer('limite_m3_consumo')->default(0);
            $table->integer('m3_sobreconsumo')->default(0);
            $table->integer('total_sobreconsumo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
