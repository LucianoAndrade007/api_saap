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
        Schema::create('repactaciones_apr', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->index('idx_repactaciones_apr_usuario');
            $table->integer('cuota_actual');
            $table->integer('total_cuotas');
            $table->integer('monto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repactaciones_apr');
    }
};
