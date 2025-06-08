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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->text('mensaje');
            $table->string('tipo_usuario', 20)->default('usuario');
            $table->boolean('activo')->default(true);
            $table->date('activo_hasta');
            $table->dateTime('fecha_creacion')->useCurrent();
            $table->unsignedInteger('administrador_id')->index('idx_notificaciones_admin');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
