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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrador_id')->index('idx_tickets_admin');
            $table->unsignedInteger('departamento_id')->index('idx_tickets_departamento');
            $table->unsignedInteger('categoria_id')->index('idx_tickets_categoria');
            $table->string('asunto', 200);
            $table->text('descripcion');
            $table->unsignedInteger('estado_id')->default(1)->index('idx_tickets_estado');
            $table->unsignedInteger('prioridad_id')->default(2)->index('idx_tickets_prioridad');
            $table->unsignedInteger('asignado_a')->nullable()->index('idx_tickets_asignado');
            $table->string('documentos')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
