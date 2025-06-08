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
        Schema::create('usuarios_suspendidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->index('idx_usuarios_suspendidos_usuario');
            $table->tinyInteger('estado')->comment('1: Suspendido, 2: Por Reponer, 3: Repuesto');
            $table->date('fecha_suspension');
            $table->timestamps();

            $table->index(['usuario_id', 'fecha_suspension'], 'idx_usuario_fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_suspendidos');
    }
};
