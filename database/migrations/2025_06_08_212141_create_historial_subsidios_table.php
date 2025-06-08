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
        Schema::create('historial_subsidios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origen', 100)->default('MARIQUINA');
            $table->unsignedInteger('usuario_id')->index('idx_historial_subsidios_usuario');
            $table->integer('run');
            $table->char('run_dv', 1);
            $table->string('apellido_paterno', 100);
            $table->string('apellido_materno', 100);
            $table->string('nombres', 100);
            $table->string('direccion');
            $table->integer('numero_decreto');
            $table->date('fecha_decreto');
            $table->integer('puntaje');
            $table->date('fecha_encuesta');
            $table->bigInteger('numero_unico');
            $table->char('numero_unico_dv', 1)->default('0');
            $table->integer('total_viviendas')->default(1)->comment('número de viviendas');
            $table->integer('consumo')->comment('metros cúbicos');
            $table->integer('monto_subsidio')->comment('Monto del subsidio');
            $table->integer('monto_cobrado')->comment('Monto cobrado');
            $table->integer('cantidad_deudas')->default(0)->comment('número de cuentas adeudadas');
            $table->string('monto_deuda', 11)->default('0000000');
            $table->integer('observacion')->default(10);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_subsidios');
    }
};
