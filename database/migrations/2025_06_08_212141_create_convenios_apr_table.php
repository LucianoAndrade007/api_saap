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
        Schema::create('convenios_apr', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->index('idx_convenios_apr_usuario');
            $table->integer('monto_deuda');
            $table->integer('pago_inicial');
            $table->date('fecha_pago');
            $table->integer('monto_restante');
            $table->integer('monto_cuota');
            $table->integer('total_cuotas');
            $table->integer('cuota_actual');
            $table->boolean('estado')->default(false)->comment('FALSE: Vigente, TRUE: Pagado');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios_apr');
    }
};
