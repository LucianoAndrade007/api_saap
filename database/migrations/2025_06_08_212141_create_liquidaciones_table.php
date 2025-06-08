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
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrador_id')->index('idx_liquidaciones_admin');
            $table->date('fecha');
            $table->unsignedInteger('afp_id')->index('idx_liquidaciones_afp');
            $table->decimal('tasa_afp', 5);
            $table->integer('monto_ips');
            $table->decimal('tasa_ips', 5);
            $table->integer('monto_salud');
            $table->decimal('tasa_salud', 5);
            $table->unsignedInteger('caja_compensacion_id')->nullable()->index('idx_liquidaciones_caja_compensacion');
            $table->integer('dependientes')->default(0);
            $table->integer('dias_trabajados');
            $table->integer('horas_extra')->default(0);
            $table->integer('horas_festivas')->default(0);
            $table->integer('salario_base');
            $table->integer('bonificacion')->default(0);
            $table->integer('gratificacion')->default(0);
            $table->integer('bonificacion_feriado')->default(0);
            $table->integer('total_horas_extra')->default(0);
            $table->integer('total_horas_festivas')->default(0);
            $table->integer('total_imponible');
            $table->integer('asignacion_desgaste_herramientas')->default(0);
            $table->integer('bonificacion_responsabilidad')->default(0);
            $table->integer('asignacion_colacion')->default(0);
            $table->integer('asignacion_movilizacion')->default(0);
            $table->integer('asignacion_familiar')->default(0);
            $table->integer('asignacion_movilidad')->default(0);
            $table->integer('total_no_imponible');
            $table->integer('total_bruto');
            $table->integer('aporte_afp');
            $table->integer('aporte_salud');
            $table->integer('seguro_cesantia');
            $table->decimal('tasa_seguro_cesantia', 5);
            $table->integer('seguro_cesantia_empleador');
            $table->integer('anticipos')->default(0);
            $table->integer('monto_prestamo')->default(0);
            $table->integer('cuota_prestamo')->default(0);
            $table->integer('prestamo_caja_compensacion')->default(0);
            $table->integer('cuota_prestamo_caja_compensacion')->default(0);
            $table->integer('ahorro_voluntario')->default(0);
            $table->integer('ahorro_previsional_voluntario')->default(0);
            $table->integer('retencion_judicial')->default(0);
            $table->integer('total_descuentos');
            $table->integer('monto_neto');
            $table->text('monto_en_palabras');
            $table->text('descripcion_legal')->nullable();
            $table->unsignedInteger('estado_id')->default(1)->index('idx_liquidaciones_estado');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidaciones');
    }
};
