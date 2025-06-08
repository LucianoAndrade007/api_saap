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
        Schema::create('registros_sistema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_cliente', 45);
            $table->unsignedInteger('administrador_id')->nullable()->index('idx_registros_sistema_admin');
            $table->unsignedInteger('usuario_id')->nullable()->index('idx_registros_sistema_usuario');
            $table->string('nombre', 100);
            $table->string('controlador', 100);
            $table->string('accion', 100);
            $table->unsignedInteger('tipo_registro_id')->default(1)->index('idx_registros_sistema_tipo');
            $table->text('detalles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_sistema');
    }
};
