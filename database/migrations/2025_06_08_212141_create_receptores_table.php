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
        Schema::create('receptores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('run', 12);
            $table->string('razon_social', 200);
            $table->string('actividad_comercial', 200);
            $table->string('direccion');
            $table->unsignedInteger('comuna_id')->index('idx_receptores_comuna');
            $table->unsignedInteger('usuario_id')->index('idx_receptores_usuario');
            $table->unsignedInteger('tipo_id')->index('idx_receptores_tipo');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['run', 'usuario_id'], 'uk_receptores_run_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptores');
    }
};
