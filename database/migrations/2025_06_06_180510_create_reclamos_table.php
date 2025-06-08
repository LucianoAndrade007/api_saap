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
        Schema::create('reclamos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->index('idx_reclamos_usuario');
            $table->unsignedInteger('tipo_reclamo_id')->index('idx_reclamos_tipo');
            $table->text('contenido');
            $table->boolean('estado')->default(true);
            $table->string('ejecutivo', 100)->default('Pendiente');
            $table->dateTime('fecha_resolucion')->nullable();
            $table->boolean('esta_eliminado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamos');
    }
};
