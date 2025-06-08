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
        Schema::create('usuarios_cliente_datos', function (Blueprint $table) {
            $table->unsignedInteger('usuario_id')->primary();
            $table->string('alias', 100)->nullable();
            $table->string('giro', 100)->nullable();
            $table->text('direccion')->nullable();
            $table->string('numero_casa', 20)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('numero_cliente', 50)->nullable();
            $table->boolean('factura')->nullable()->default(false);
            $table->boolean('subsidio_apr')->nullable()->default(false);
            $table->integer('tipo_cliente_id')->nullable();
            $table->unsignedInteger('id_ruta')->nullable()->index('fk_usuarios_ruta');
            $table->boolean('subsidio_municipal')->nullable()->default(false);
            $table->decimal('porcentaje_desc_municipal', 5)->nullable();
            $table->decimal('mcs_desc_municipal', 5)->nullable();
            $table->decimal('fijos_desc_municipal', 5)->nullable();
            $table->string('numero_resolucion', 50)->nullable();
            $table->string('puntaje_ficha', 20)->nullable();
            $table->date('fecha_encuesta')->nullable();
            $table->bigInteger('numunico')->nullable();
            $table->integer('dv_numunico')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_cliente_datos');
    }
};
